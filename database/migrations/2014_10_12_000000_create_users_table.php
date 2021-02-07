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
            $table->unsignedBigInteger('role_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('city');
            $table->string('country');
            $table->date('dob');
            $table->string('phone');
            $table->string('password');
            $table->enum('status', ['1', '0'])->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
        // Schema::table('users', function($table) {
        //     $table->foreign('role_id')->references('id')->on('roles');
        // });
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
