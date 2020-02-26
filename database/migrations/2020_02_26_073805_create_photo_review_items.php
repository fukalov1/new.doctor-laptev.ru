<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoReviewItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_review_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('photo_review_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('url')->nullable();
            $table->string('image');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->integer('orders')->default(1);
            $table->foreign('photo_review_id')->references('id')->on('photo_reviews')->onDelete('cascade');
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
        Schema::dropIfExists('photo_review_items');
    }
}
