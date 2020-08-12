<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedSalary extends Model
{
    public function designationRelation(){
        return $this->belongsTo(Designation::class,'designationId','designationId');
    }
    public function salaryComponentInfo(){
        return $this->hasMany(SalaryComponentInformation::class,'fixedSalaryId');
    }
}
