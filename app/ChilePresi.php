<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChilePresi extends Model
{
    protected $fillable = ['id', 'chile_presi','questionare_id','created_at','date'];

    protected $dates = ['date'];
}
