<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\\User');
    }
    protected $fillable = ['muscolo', 'esercizio', 'serie', 'repetizioni', 'recupero', 'note', 'user_id','page_nr'];
}
