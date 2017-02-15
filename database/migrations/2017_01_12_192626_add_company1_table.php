<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompany1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('companies', function (Blueprint $table) {

        $table->increments('id');
        $table->string('name');
        $table->integer('idCategory')->unsigned();
        $table->text('description');
        $table->string('address');
        $table->integer('idCity')->unsigned();
        $table->string('email')->unique();
        $table->string('website')->nullable();
        $table->string('logo')->nullable();
        $table->string('color')->nullable();
        $table->string('facebook')->nullable();
        $table->string('twitter')->nullable();
        $table->string('instagram')->nullable();

        $table->foreign('idCity')->references('id')->on('cities')->onDelete('cascade');
        $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');

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
      Schema::dropIfExists('companies');
  }
}
