<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_menus', function (Blueprint $table) {
            $table->bigIncrements('permissionMenuId');           
            $table->string('menuName');
            $table->string('menuPosition');
            $table->string('menuUrl');  
            $table->string('memberId');
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
        Schema::dropIfExists('permission_menus');
    }
}
