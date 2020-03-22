<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CitiesAddPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->string('xcoord')->default('1');
            $table->string('ycoord')->default('1');
            $table->string('content')->nullable();
            $table->string('header')->nullable();
            $table->string('body')->nullable();
            $table->string('hint')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('xcoord');
            $table->dropColumn('ycoord');
            $table->dropColumn('content');
            $table->dropColumn('header');
            $table->dropColumn('body');
            $table->dropColumn('hint');
        });
    }
}
