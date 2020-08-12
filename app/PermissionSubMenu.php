<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionSubMenu extends Model
{
    public function MenuRelation(){
        return $this->belongsTo(Menu::class,'menuId','menuId');
    }
    public function SubMenuRelation(){
        return $this->belongsTo(SubMenu::class,'subMenuId','subMenuId');
    }
}
