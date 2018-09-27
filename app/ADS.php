<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ADS extends Model
{
    protected $fillable = ['id', 'photo', 'name','url'];
}
