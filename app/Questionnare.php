<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnare extends Model
{
    protected $fillable = ['id', 'email', 'name','cognome','sesso','altezza','allenato','struttura_programma','durata_allenamento','first_question','second_question','third_question','forth_question','fifth_question','sixth_question','seventh_question','eighth_question','ninth_question','ten_question','eta'];

}
