<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('review_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tour_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->text('content');
            $table->integer('rating');
            $table->timestamps();
        
            // Định nghĩa các ràng buộc khóa ngoại
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('tour_id')->references('tour_id')->on('tours');
            $table->foreign('room_id')->references('room_id')->on('rooms');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
