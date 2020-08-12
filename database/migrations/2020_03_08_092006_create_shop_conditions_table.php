<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_conditions', function (Blueprint $table) {
            $table->bigIncrements('shopTypeConditionId');
            $table->string('shopTypeCode');
            $table->string('shopTypeName');
            $table->string('shopCondition');
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
        Schema::dropIfExists('shop_conditions');
    }
}
