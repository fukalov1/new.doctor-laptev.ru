<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_form_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mailform_id')->unsigned();
            $table->integer('orders')->default(1);
            $table->string('field_name');
            $table->string('field_value');
            $table->integer('field_type_id')->default(1);
//            $table->foreign('mailform_id')->references('id')->on('mailforms')->ondelete('cascade');
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
        Schema::dropIfExists('mail_form_fields');
    }
}
