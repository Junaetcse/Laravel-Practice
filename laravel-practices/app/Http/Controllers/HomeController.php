<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //


    public function mail(){

        Mail::to('junaetcse@gmail.com')->send(new SendMailable());
        return 'Email was sent';
    }




    public function sql(){

    	$users = DB::table('users')->get();
    	// $user = DB::table('users')->where('name','Friedrich Bergnaum')->first();
    	// return $user->name;
    	$user = DB::table('users')->where('name','Friedrich Bergnaum')->value('email');
    	return $user;
    }
}
