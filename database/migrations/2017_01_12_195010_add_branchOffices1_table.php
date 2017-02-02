<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchOffices1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchOffices', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('idCompany')->unsigned();
           $table->foreign('idCompany')->references('id')->on('companies')->onDelete('cascade');
           $table->integer('phone');
           $table->integer('cellPhone');
           $table->string('address');
           $table->integer('idCity')->unsigned();
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
        Schema::dropIfExists('branchOffices');
    }
}
