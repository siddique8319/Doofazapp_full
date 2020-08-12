<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryComponentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_component_information', function (Blueprint $table) {
            $table->bigIncrements('salaryComponentInfoId');
            $table->string('salaryComponentId');
            $table->string('fixedSalaryId');
            $table->string('amount');
            $table->string('totalSalary');
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
        Schema::dropIfExists('salary_component_information');
    }
}
