<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PostController extends Controller implements AdministrableController
{

    public function FormNew()
    {
        return "Not yet implemented";
    }

    public function Create(Request $request)
    {
        return "Not yet implemented";
    }

    public function DetailsAdmin($permalink)
    {
        $post = Post::where('permalink', $permalink)->firstOrFail();
        return view('post.details-admin', [
            'column_names' => Schema::getColumnListing(strtolower(str_plural('post'))),
            'permalink' => $permalink,
            'post' => Post::where('permalink', $permalink)->firstOrFail()
        ]);
    }

    public function Edit($permalink)
    {
        $post = Post::where('permalink', $permalink)->first();
        $festivals = Festival::get(['id', 'name']);
        return view('post.edit', [
            'permalink' => $permalink,
            'post' => $post,
            'festivals' => $festivals,
        ]);
    }

    public function Update(Request $request, $permalink)
    {
        if ($request->get('permalink', '') != $permalink) {
            $this->validate($request, [
                'title' => 'required',
                'permalink' => 'required|unique:posts',
            ]);
        }
        $post = Post::where('permalink', $permalink)->firstOrFail();
        $post->title = $request->get('title');
        $post->lead = $request->get('lead');
        $post->body = $request->get('body');
        $post->festival()->associate($request->get('festival_id'));
        $post->save();
        return redirect()->action('PostController@DetailsAdmin', [$post])->with('updated', true);
    }

    public function DeleteConfirm($permalink)
    {
        return redirect()->action('AdminController@PostsList')
            ->with('deleted', Post::where('permalink', $permalink)->delete());
    }
}