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
            $table->string('client');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('code',10)->unique();
            $table->integer('count')->default(0);
            $table->boolean('free')->default(true);
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
