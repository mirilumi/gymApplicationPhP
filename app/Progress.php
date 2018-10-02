<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = ['id', 'sesso', 'note','first_photo','second_photo','user_id'];

}
