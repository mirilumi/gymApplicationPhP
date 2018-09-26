<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlankPage extends Model
{
    protected $fillable = ['id', 'description', 'default_program_id'];
}
