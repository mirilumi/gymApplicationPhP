<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChilePresisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chile_presis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chile_presi')->nullable();
            $table->date('date')->nullable();
            $table->integer('questionare_id')->unsigned()->nullable();
            $table->foreign('questionare_id')
                ->references('id')->on('questionnares')
                ->onDelete('cascade');
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
        Schema::dropIfExists('chile_presis');
    }
}
