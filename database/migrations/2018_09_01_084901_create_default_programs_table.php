<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('second_box_id')->unsigned()->nullable();
//            $table->foreign('second_box_id')
//                ->references('id')->on('second_box_defaults')
//                ->onDelete('cascade');
            $table->integer('third_box_id')->unsigned()->nullable();
//            $table->foreign('third_box_id')
//                ->references('id')->on('third_box_table_defaults')
//                ->onDelete('cascade');
            $table->boolean('is_blank')->default(0);
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
        Schema::dropIfExists('default_programs');
    }
}
