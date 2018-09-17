<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = ['id', 'sesso', 'kili_persi','kili_presi','girovita','girocoscia','fianchi','circonferenza_toracica','note','first_photo','second_photo','user_id'];

}
