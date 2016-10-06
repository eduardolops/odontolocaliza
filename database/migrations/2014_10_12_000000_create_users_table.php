<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('number_cro')->unique();
            $table->string('doc_cpf',50);
            // $table->string('doc_rg',50);
            $table->integer('specialization');
            $table->integer('states');
            $table->integer('city');
            $table->integer('country');
            $table->string('zip_code',25);
            $table->string('address');
            $table->integer('number');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->string('office_hours');
            $table->string('phone',50);
            $table->string('cell_phone',50);
            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_instagran')->nullable();
            $table->string('social_gplus')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
