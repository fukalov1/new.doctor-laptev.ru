<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micro_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('text');
            $table->text('url')->nullable();
            $table->integer('order')->default('1');
            $table->bigInteger('page_id')->unsigned();
            $table->bigInteger('page_block_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
        Schema::dropIfExists('micro_blocks');
    }
}
