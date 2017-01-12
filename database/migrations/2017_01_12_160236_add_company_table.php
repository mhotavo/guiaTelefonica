<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('company', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('description');
        $table->integer('phone',10);
        $table->integer('cellPhone',10);
        $table->string('address');
        $table->integer('idCity')->unsigned();
        $table->foreign('foreign_city_company')->references('id')->on('city')->onDelete('cascade');
        $table->integer('idCategory')->unsigned();
        $table->foreign('foreign_category_company')->references('id')->on('category')->onDelete('cascade');
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
      Schema::dropIfExists('company');
    }
  }
