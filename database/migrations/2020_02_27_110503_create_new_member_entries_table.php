<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewMemberEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_member_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('upLine')->nullable();
            $table->string('downLine')->nullable();           
            $table->string('level')->nullable();                     
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
        Schema::dropIfExists('new_member_entries');
    }
}
