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

       // $this->basicSql();
        $this->sqlPart2();
    }



    public function basicSql(){
        DB::table('users')->get();
        $user = DB::table('users')->where('name','Friedrich Bergnaum')->first();
        DB::table('users')->where('name','Friedrich Bergnaum')->value('email');
        DB::table('users')->orderBy('id')->chunk(20,function ($users){
            foreach ($users as $user ){
                return $user;
            }
        });
    }


    public function sqlPart2(){
       DB::table('users')->where('email','frosenbaum@example.org')->exists();
        $user = DB::table('users')->select('name', 'email as user_emial')->get();
        $dis = DB::table('users')->distinct()->get();
        $query = DB::table('users')->select('name');
        $dd = $query->addSelect('email')->get();
        
       // dump($query);
        return $dis;

    }

}
