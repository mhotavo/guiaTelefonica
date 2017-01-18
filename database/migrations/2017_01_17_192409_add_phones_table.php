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
            $table->integer('idCompany')->unsigned();
            $table->integer('idPerson')->unsigned();
            $table->integer('indicator')->nullable();;
            $table->integer('phone');
            $table->integer('extension')->nullable();;
            $table->char('whatsapp', 1)->nullable();;

            $table->foreign('idCompany')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('idPerson')->references('id')->on('persons')->onDelete('cascade');
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