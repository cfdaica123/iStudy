<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('user_id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('user_status_id');
            $table->foreign('user_status_id')->references('user_status_id')->on('user_statuses');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('role_id')->on('roles');
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
        Schema::dropIfExists('users');
    }
}
