<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChilePersi extends Model
{
    protected $fillable = ['id', 'chile_persi','questionare_id','created_at','date'];

    protected $dates = ['date'];
}
