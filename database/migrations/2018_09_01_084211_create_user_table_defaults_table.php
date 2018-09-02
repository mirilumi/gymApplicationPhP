<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTableDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_table_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->string('muscolo');
            $table->string('esercizio');
            $table->string('serie');
            $table->string('repetizioni');
            $table->string('recupero');
            $table->string('note');
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
        Schema::dropIfExists('user_table_defaults');
    }
}
