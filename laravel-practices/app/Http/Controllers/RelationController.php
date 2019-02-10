<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RelationController extends Controller
{
    //

    public function ormRelation(){

     $post =   User::find(1)->post()->get();
    return $post;

    }




}
