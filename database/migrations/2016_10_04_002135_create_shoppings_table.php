<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_doctor')->unsigned();
            $table->integer('id_plan')->unsigned();
            $table->string('descrition');
            $table->float('price');
            $table->float('discount');
            $table->float('amount');
            $table->string('payment_type');
            $table->string('plots');
            $table->string('order_status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_doctor')->references('id')->on('users');
            $table->foreign('id_plan')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppings');
    }
}
