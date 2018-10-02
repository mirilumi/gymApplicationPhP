<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Girovita extends Model
{
    protected $fillable = ['id', 'girovita','questionare_id','created_at','date'];

    protected $dates = ['date'];
}
