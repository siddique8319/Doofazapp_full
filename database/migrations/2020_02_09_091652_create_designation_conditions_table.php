<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designation_conditions', function (Blueprint $table) {
            $table->bigIncrements('designationConditionId');
            $table->integer('designationId');
            $table->string('directSaleTarget');
            $table->string('teamSaleTarget');
            $table->string('memberTarget');
            $table->string('type');
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
        Schema::dropIfExists('designation_conditions');
    }
}
