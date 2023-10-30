<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('employee_id');
            $table->string('full_name');
            $table->string('address');
            $table->string('phone');
            $table->dateTime('birthday')->nullable();
            $table->string('gender');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('position');
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
