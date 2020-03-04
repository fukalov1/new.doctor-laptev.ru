<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('price')->default(0);
            $table->boolean('active')->default(false);
            $table->smallInteger('show_count')->default(1);
            $table->integer('max_time')->default(0);
            $table->text('text');
            $table->string('image')->nullable();
            $table->string('video_m4v')->nullable();
            $table->string('video_webm')->nullable();
            $table->string('video_ogv')->nullable();
            $table->string('video_mp4')->nullable();
            $table->string('audio_mp3')->nullable();
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
        Schema::dropIfExists('pay_services');
    }
}
