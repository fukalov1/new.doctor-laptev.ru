<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inv_id');
            $table->integer('sum');
            $table->bigInteger('pay_service_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('success')->default(false);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('log_payments');
    }
}
