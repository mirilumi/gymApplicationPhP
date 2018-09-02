<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTableMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_table_mappings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_table_id')->unsigned()->nullable();
            $table->foreign('user_table_id')
                ->references('id')->on('user_table_defaults')
                ->onDelete('cascade');
            $table->integer('default_program_id')->unsigned()->nullable();
            $table->foreign('default_program_id')
                ->references('id')->on('default_programs')
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
        Schema::dropIfExists('user_table_mappings');
    }
}
