<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('projectId');
            $table->string('projectTypeId')->nullable();
            $table->string('projectName')->nullable();
            $table->longText('projectDescription')->nullable();
            $table->longText('projectAdvantage')->nullable();
            $table->string('price')->nullable();
            $table->string('offer')->nullable();
            $table->string('result')->nullable();
            $table->string('totalPrice')->nullable();
            $table->string('startDate')->nullable(); 
            $table->string('endDate')->nullable();             
            $table->string('image')->nullable();  
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
        Schema::dropIfExists('projects');
    }
}
