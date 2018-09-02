<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondBox extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\\User');
    }
    protected $fillable = ['id', 'title', 'description','user_id'];

}
