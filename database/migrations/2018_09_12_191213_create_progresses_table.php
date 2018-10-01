<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('sesso')->nullable();
//            $table->string('kili_persi')->nullable();
//            $table->string('kili_presi')->nullable();
            $table->string('girovita')->nullable();
            $table->string('girocoscia')->nullable();
            $table->string('fianchi')->nullable();
            $table->string('circonferenza_toracica')->nullable();
            $table->string('first_photo')->nullable();
            $table->string('second_photo')->nullable();
            $table->text('note')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('progresses');
    }
}
