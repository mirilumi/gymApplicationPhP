<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fianchi extends Model
{
    protected $fillable = ['id', 'fianchi','questionare_id','created_at','date'];

    protected $dates = ['date'];
}
