<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PostController extends Controller implements AdministrableController
{

    public function FormNew()
    {
        $festivals = Auth::user()->festivals()->get();
        return view('post.create', [
            'festivals' => $festivals,
        ]);
    }

    public function Create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'permalink' => 'required|unique:posts',
            'lead' => 'required',
            'body' => 'required'
        ]);
        $post = new Post([
            'title' => $request->get('title'),
            'permalink' => $request->get('permalink'),
            'lead' => $request->get('lead'),
            'body' => $request->get('body'),
            'festival_id' => $request->get('festival_id') //NO ME GUSTA
        ]);
        $post->saveOrFail();
        return redirect()->action('PostController@DetailsAdmin', [$post])->with('created', true);
    }

    public function Create2($data)
    {
        $post = new Post([
            'title' => $data['title'],
            'permalink' => $data['permalink'],
            'lead' => $data['lead'],
            'body' => $data['body'],
            'festival_id' => $data['festival_id'] //NO ME GUSTA
        ]);
        $post->saveOrFail();
        
    }

    public function DetailsAdmin($permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al festival indicado
        $festivals = Auth::user()->festivals()->get();
        $festivals_id = array();
        foreach($festivals as $fest){
           array_push($festivals_id, $fest->id);
        }
        $post = Post::where('permalink', $permalink)->whereIn('festival_id',$festivals_id)->first();
        if ($post == null) {
            return redirect('/noPermision');
        }
        return view('post.details-admin', [
            'column_names' => Schema::getColumnListing(strtolower(str_plural('post'))),
            'permalink' => $permalink,
            'post' => Post::where('permalink', $permalink)->firstOrFail()
        ]);
    }

    public function Edit($permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al festival indicado
        $festivals = Auth::user()->festivals()->get();
        $festivals_id = array();
        foreach($festivals as $fest){
           array_push($festivals_id, $fest->id);
        }
        $post = Post::where('permalink', $permalink)->whereIn('festival_id',$festivals_id)->first();
        if ($post == null) {
            return redirect('/noPermision');
        }
        return view('post.edit', [
            'permalink' => $permalink,
            'post' => $post,
            'festivals' => $festivals,
        ]);
    }

    public function Update(Request $request, $permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al festival indicado
        $festivals = Auth::user()->festivals()->get();
        $festivals_id = array();
        foreach($festivals as $fest){
           array_push($festivals_id, $fest->id);
        }
        $post = Post::where('permalink', $permalink)->whereIn('festival_id',$festivals_id)->first();
        if ($post == null) {
            return redirect('/noPermision');
        }
        if ($request->get('permalink', '') != $permalink) {
            $this->validate($request, [
                'permalink' => 'required|unique:posts',
            ]);
        }
        $this->validate($request, [
            'title' => 'required',
            'lead' => 'required',
            'body' => 'required',
        ]);
        $post->title = $request->get('title');
        $post->lead = $request->get('lead');
        $post->body = $request->get('body');
        $post->festival()->associate($request->get('festival_id'));
        $post->save();
        return redirect()->action('PostController@DetailsAdmin', [$post])->with('updated', true);
    }

    public function Delete($permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al festival indicado
        $festivals = Auth::user()->festivals()->get();
        $festivals_id = array();
        foreach($festivals as $fest){
           array_push($festivals_id, $fest->id);
        }
        $post = Post::where('permalink', $permalink)->whereIn('festival_id',$festivals_id)->first();
        if ($post == null) {
            return redirect('/noPermision');
        }
        return redirect()->action('AdminController@PostsList')
            ->with('deleted', $post->delete());
    }
}