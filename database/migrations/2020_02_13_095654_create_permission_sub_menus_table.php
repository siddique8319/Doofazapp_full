<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_sub_menus', function (Blueprint $table) {
            $table->bigIncrements('permissionSubMenuId');
            $table->string('menuId');
            $table->string('subMenuName');
            $table->string('subMenuPosition');
            $table->string('subMenuUrl');
            $table->string('memberId')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('permission_sub_menus');
    }
}
