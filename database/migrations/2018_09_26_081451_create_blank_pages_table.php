<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlankPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blank_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
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
        Schema::dropIfExists('blank_pages');
    }
}
