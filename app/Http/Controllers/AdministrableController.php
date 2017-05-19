<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/04/17
 * Time: 16:18
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface AdministrableController
{
    public function FormNew();

    public function Create(Request $request);

    public function DetailsAdmin($permalink);

    public function Edit($permalink);

    public function Update(Request $request, $permalink);

    public function Delete($permalink);
}