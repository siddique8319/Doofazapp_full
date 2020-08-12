<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewShopEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_shop_entries', function (Blueprint $table) {
            $table->bigIncrements('shopId');
            $table->string('shopName')->nullable();
            $table->string('ownerName')->nullable();
            $table->string('ownerMobile')->nullable();
            $table->string('representative')->nullable();
            $table->string('representativeMobile')->nullable();
            $table->string('businessEmail')->nullable();
            $table->string('businessType')->nullable();
            $table->string('marketName')->nullable();
            $table->string('shopNo')->nullable();
            $table->string('userName')->nullable();
            $table->string('password')->nullable();
            $table->string('shopFront')->nullable();
            $table->string('shopBehind')->nullable();
            $table->string('shopLeft')->nullable();
            $table->string('shopRight')->nullable();
            $table->string('divisionId')->nullable();
            $table->string('districtId')->nullable();
            $table->string('thanaId')->nullable();
            $table->string('unionId')->nullable();
            $table->string('address')->nullable();
            $table->string('createdBy');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('new_shop_entries');
    }
}
