<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    protected $fillable = ['id', 'peso','questionare_id','created_at','date'];

    protected $dates = ['date'];


}
