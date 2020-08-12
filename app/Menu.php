<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function permissionMenu(){
        return $this->hasMany(PermissionMenu::class,'menuId');
    }
    public function SubMenu(){
        return $this->hasMany(SubMenu::class,'menuId');
    }
}
