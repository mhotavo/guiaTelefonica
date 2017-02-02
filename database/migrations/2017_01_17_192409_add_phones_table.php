<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCompany')->unsigned()->nullable();
            $table->integer('idPerson')->unsigned()->nullable();
            $table->integer('idBranch')->unsigned()->nullable();
            $table->string('indicator')->nullable()->default('57');             
            $table->string('phone');
            $table->string('extension')->nullable();
            $table->char('whatsapp', 1)->nullable();

            $table->foreign('idCompany')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('idPerson')->references('id')->on('persons')->onDelete('cascade');
            $table->foreign('idBranch')->references('id')->on('branchOffices')->onDelete('cascade');
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
        Schema::dropIfExists('phones');
    }
}
