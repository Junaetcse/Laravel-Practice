<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    protected $fillable = [
        'user_id', 'info', 'number',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function activity(){
        return $this->hasOne(Activity::class);
    }

}
