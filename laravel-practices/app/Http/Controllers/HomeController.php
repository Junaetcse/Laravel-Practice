<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //


    public function mail(){

        Mail::to('junaetcse@gmail.com')->send(new SendMailable());
        return 'Email was sent';
    }
}
