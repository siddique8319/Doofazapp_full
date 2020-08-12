<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public function memberEntry(){
        return $this->hasMany(MemberEntry::class,'designationId');
    }
    public function fixedSalary(){
        return $this->hasMany(FixedSalary::class,'designationId');
    }
    public function incentive(){
        return $this->hasMany(Incentive::class,'designationId');
    }
    public function designationCondition(){
        return $this->hasMany(DesignationCondition::class,'designationId');
    }
}
