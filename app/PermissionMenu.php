<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionMenu extends Model
{
    public function MenuRelation(){
        return $this->belongsTo(Menu::class,'menuId','menuId');
    }
    public function userRelation(){
        return $this->belongsTo(User::class,'id','id');
    }
    public function subMenuRelation(){
        return $this->belongsTo(SubMenu::class,'subMenuId','subMenuId');
    }
}
