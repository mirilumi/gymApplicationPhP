<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('cognome');
            $table->string('sesso')->nullable();
            $table->string('altezza')->nullable();
            $table->string('allenato')->nullable();
            $table->string('struttura_programma')->nullable();
            $table->string('durata_allenamento')->nullable();
            $table->string('first_question')->nullable();
            $table->string('second_question')->nullable();
            $table->string('third_question')->nullable();
            $table->string('forth_question')->nullable();
            $table->string('fifth_question')->nullable();
            $table->string('sixth_question')->nullable();
            $table->string('seventh_question')->nullable();
            $table->string('eighth_question')->nullable();
            $table->string('ninth_question')->nullable();
            $table->string('ten_question')->nullable();
            $table->string('eta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnares');
    }
}
