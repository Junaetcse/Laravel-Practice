<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = [
        'contact_id', 'cell_number', 'status','ranking'
    ];

    public function contacts(){
        return $this->belongsTo(Contact::class);
    }
}
