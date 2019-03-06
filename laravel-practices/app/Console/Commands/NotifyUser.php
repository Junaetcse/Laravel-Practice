<?php

namespace App\Console\Commands;

use App\Contact;
use App\Mail\SendMailable;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notified user for there contact';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $user = User::find(2);
        $info = Contact::with('user')->select('info')->where('user_id',2)->get();
        info($info);
        if ($info){
            Mail::to($user->email)->send(new SendMailable());
        }

    }
}
