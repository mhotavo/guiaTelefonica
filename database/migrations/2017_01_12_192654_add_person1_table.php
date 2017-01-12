<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPerson1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('persons', function (Blueprint $table) {
       $table->increments('id');
       $table->string('firstName');
       $table->string('secondName')->nullable();
       $table->string('surname');
       $table->string('secondSurname')->nullable();
       $table->date('birthday')->nullable();
       $table->integer('phone');
       $table->integer('cellPhone');
       $table->string('address');
       $table->integer('idCity')->unsigned();
       $table->string('profession');
       $table->string('email')->unique();
       $table->string('website')->nullable();
       $table->string('facebook')->nullable();
       $table->string('twitter')->nullable();
       $table->string('instagram')->nullable();

       $table->foreign('idCity')->references('id')->on('cities')->onDelete('cascade');

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
      Schema::dropIfExists('persons');
    }
  }
