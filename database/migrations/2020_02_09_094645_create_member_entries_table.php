<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type')->default(2);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->string('presentAddress')->nullable();
            $table->string('permanentAddress')->nullable();
            $table->string('sponsorId')->nullable();
            $table->string('refferalId')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('member_entries');
    }
}
