<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('group_code_id')->unsigned();
            $table->string('client')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('code',10);
            $table->integer('count')->default(0);
            $table->boolean('free')->default(true);
            $table->dateTime('date')->nullable();
            $table->unique(['group_code_id', 'code']);
            $table->foreign('group_code_id')->on('group_codes')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('codes');
    }
}
