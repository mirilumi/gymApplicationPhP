<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdBoxTable extends Model
{

    public function user()
    {
        return $this->belongsTo('App\\User');
    }
    protected $fillable = ['description', 'image', 'id', 'user_id'];
}
