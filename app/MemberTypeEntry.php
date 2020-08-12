<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberTypeEntry extends Model
{
    public function memberTypeRelation(){
        return $this->belongsTo(User::class,'memberId','memberId');
    }
    
}
