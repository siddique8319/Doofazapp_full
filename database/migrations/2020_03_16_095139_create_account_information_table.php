<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_information', function (Blueprint $table) {
            $table->bigIncrements('accountInfoId');
            $table->string('customerId');
            $table->string('incomeType')->default(1);
            $table->string('salesType')->default(0);
            $table->string('balance')->default(0);
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
        Schema::dropIfExists('account_information');
    }
}
