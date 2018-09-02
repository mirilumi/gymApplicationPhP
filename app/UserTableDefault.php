<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTableDefault extends Model
{
    protected $fillable = ['muscolo', 'esercizio', 'serie', 'repetizioni', 'recupero', 'note'];

}
