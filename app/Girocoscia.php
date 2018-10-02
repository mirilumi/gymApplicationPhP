<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Girocoscia extends Model
{
    protected $fillable = ['id', 'girocoscia','questionare_id','created_at','date'];

    protected $dates = ['date'];
}
