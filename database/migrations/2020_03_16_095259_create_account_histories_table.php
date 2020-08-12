<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_histories', function (Blueprint $table) {
            $table->bigIncrements('accountHistoryId');
            $table->string('customerId')->nullable();
            $table->string('incomeType')->default(1);
            $table->string('salesType')->default(0);
            $table->string('balance')->default(0);
            $table->string('shopId');
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
        Schema::dropIfExists('account_histories');
    }
}
