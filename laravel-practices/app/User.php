<?php

namespace App;

use App\Events\UserCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $dispatchesEvents = [
        'created' => UserCreated::class,
    ];

//    public function contacts(){
//        return $this->hasMany(Contact::class);
//    }

    public function post(){

        return $this->hasMany(Post::class, 'user_id','id');
    }
}
