<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('status');
            $table->smallInteger('age');
            $table->smallInteger('weight');
            $table->smallInteger('rost');
            $table->string('davlen',50);
            $table->string('code', 10)->nullable();
            $table->string('response')->nullable();
            $table->text('info')->nullable();
            $table->enum('type', ['1'=>'первичная', '2'=>'вторичная']);
            $table->softDeletes();
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
        Schema::dropIfExists('profiles');
    }
}
