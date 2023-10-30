<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name');
            $table->decimal('price_per_night', 10, 2);
            $table->boolean('available');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('room_categories')->onDelete('set null');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
