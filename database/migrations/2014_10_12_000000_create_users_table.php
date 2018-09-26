<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('ip')->nullable();
            $table->string('password');
            $table->string('cognome')->nullable();
            $table->string('purchase')->nullable();
            $table->string('telefono')->nullable();
            $table->string('indirizzio')->nullable();
            $table->string('image')->nullable();
            $table->datetime('date_purchase');
            $table->datetime('last_login');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('active')->default(0);
            $table->boolean('is_admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
