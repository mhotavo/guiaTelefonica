<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchOffice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCompany')->unsigned();
            $table->foreign('foreign_company_branchOffice')->references('id')->on('company')->onDelete('cascade');
            $table->integer('phone',10);
            $table->integer('cellPhone',10);
            $table->string('address');
            $table->integer('idCity')->unsigned();
            $table->foreign('foreign_city_branchOffice')->references('id')->on('city')->onDelete('cascade');
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
        Schema::dropIfExists('branchOffice');
    }
}
