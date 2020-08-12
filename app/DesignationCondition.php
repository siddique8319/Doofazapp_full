<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationCondition extends Model
{
    public function designationRelation(){
        return $this->belongsTo(Designation::class,'designationId','designationId');
    }
}
