<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'description'
    ];

    protected $dates = ['deleted_at'];


    public function softDelete(){
        $post = $this->all();
        $flights = $this->withTrashed()->get();
        $flights2 = $this->onlyTrashed()->get();
        $post1 = $this->withTrashed()->restore();
        $post2= Post::find(1)->forceDelete();
     //  dd($post1);
    }
}
