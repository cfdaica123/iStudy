<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('tour_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('city');
            $table->string('address');
            $table->decimal('latitude', 10, 6);
            $table->decimal('longitude', 10, 6);
            $table->float('distance');
            $table->decimal('price', 10, 2);
            $table->integer('max_group_size');
            $table->text('description');
            $table->string('cover_image')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
