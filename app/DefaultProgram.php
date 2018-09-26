<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultProgram extends Model
{
    protected $fillable = ['second_box_id', 'third_box_id', 'user_table_id', 'name','is_blank'];
}
