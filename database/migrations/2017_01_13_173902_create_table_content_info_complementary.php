<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContentInfoComplementary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_info_complementaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('info_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('description');
            $table->integer('status')->default('1');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('info_id')->references('id')->on('info_complementaries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_info_complementaries');
    }
}
