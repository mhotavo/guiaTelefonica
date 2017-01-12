<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
          $table->increments('id');
          $table->string('firstName');
          $table->string('secondName');
          $table->string('surname');
          $table->string('secondSurname');
          $table->integer('phone',10);
          $table->integer('cellPhone',10);
          $table->string('address');
          $table->integer('idCity')->unsigned();
          $table->foreign('foreign_city_person')->references('id')->on('city')->onDelete('cascade');
          $table->string('profession');
          $table->string('email')->unique();
          $table->string('website');
          $table->string('facebook');
          $table->string('twitter');
          $table->string('instagram');
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
        Schema::dropIfExists('person');
    }
}
