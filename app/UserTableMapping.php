<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTableMapping extends Model
{
    protected $fillable = ['user_table_id', 'default_program_id'];

}
