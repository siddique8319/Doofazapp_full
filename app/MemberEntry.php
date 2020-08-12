<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberEntry extends Model
{
  
    public function designationRelation(){
        return $this->belongsTo(Designation::class,'designationId','designationId');
    }
    public function memberTypeEntry(){
        return $this->hasMany(MemberTypeEntry::class,'memberId');
    }
}

