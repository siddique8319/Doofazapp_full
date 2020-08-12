<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    public function permissionSubMenu(){
        return $this->hasMany(PermissionSubMenu::class,'subMenuId');
    }
    public function MenuRelation(){
        return $this->belongsTo(Menu::class,'menuId','menuId');
    }
    
}
