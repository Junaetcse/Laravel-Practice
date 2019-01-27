<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\SendMailable;
use App\Notifications\LessonUpdate;
use App\Notifications\SmsNotification;
use App\User;
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
       //$this->sqlPart2();
       //$this->sqlJoin();
       //$this->sqlWhereCluse();
       $this->qslOrder();
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
        return $dis;
    }


    public function sqlJoin(){
        $value = DB::table('users')->crossJoin('contacts')->get();
        $value2 = DB::table('users')->join('contacts',function ($join){
            $join->on('users.id','=', 'contacts.user_id');
        })->get();
    }


    public function sqlWhereCluse(){
        // Difference between two query
        //select * from `activities` where `ranking` = ? and `status` = ?
        //select * from `activities` where (`ranking` = ? and `status` = ?)
        $info = DB::table('activities')->where([['ranking', '=', 3],['status', '=', 'Ut deleniti ut optio neque.']])->get();
        $info = DB::table('activities')->where('ranking', '=', 3)->where('status', '=', 'Ut deleniti ut optio neque.')->get();
        $info = DB::table('activities')->where('ranking', '=', 3)->orWhere('status', '=', 'Ut deleniti ut optio neque.')->get();
        //between where clauses
        $info = DB::table('activities')->whereBetween('ranking', [1,3])->get(); // select * from `activities` where `ranking` between ? and ?
        //compare column to column if same data
        DB::table('activities')->whereColumn('contact_id','ranking')->get(); //select * from `activities` where `contact_id` = `ranking`
        DB::table('users')->whereExists(function ($query){$query->select(DB::raw(info))->from('contacts')->whereRaw('contacts.user_id = users.id');})->get();
        return $info;
    }


    public function qslOrder(){
        DB::table('users')->latest()->first(); //select * from `users` order by `created_at` desc
        DB::table('users')->inRandomOrder()->first();
        DB::table('contacts')->groupBy('user_id')->having('user_id','>',20)->get();
        DB::table('users')->skip(10)->take(5)->get(); //select * from `users` limit 5 offset 10
        
    }



    public function mailNotification()
    {
        // $users = User::where('email','doris53@example.com')->first();
        //$users = User::where('name','like','%A%')->get();
        //  App\User::where('name','like','%A%')->count();

        $users = User::whereBetween('id', [5,10])->get();;
        foreach ($users as $user){
            $contact = Contact::first();
            $user->notify(new LessonUpdate($contact));
        }

        $user = new User();
        $user->phone_number= '+8801767590626';   // Don't forget specify country code.
        $user->notify(new SmsNotification());

    }

//    public function routeNotificationForNexmo($notification)
//    {
//        return "";
//    }
}
