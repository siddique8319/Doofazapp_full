<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_information', function (Blueprint $table) {
            $table->bigIncrements('balanceInfoId');
            $table->string('memberId');
            $table->string('directSale');
            $table->string('directSaleSponsore');
            $table->string('generation');
            $table->string('dailySaleRoyality');
            $table->string('dailySaleDesignation');
            $table->string('dailyTopSaler');
            $table->string('monthlyDirectSale');
            $table->string('monthlyDirectSaleSponsore');
            $table->string('monthlyGeneration');
            $table->string('monthlyCollectionRoyality');
            $table->string('monthlySalesDesignation');
            $table->string('monthlyTop10Saler');
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
        Schema::dropIfExists('balance_information');
    }
}
