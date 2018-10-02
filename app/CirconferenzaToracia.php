<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CirconferenzaToracia extends Model
{
    protected $fillable = ['id', 'circonferenza_toracia','questionare_id','created_at','date'];

    protected $dates = ['date'];
}
