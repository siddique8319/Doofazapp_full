<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryComponentInformation extends Model
{
    public function fixedSalaryRelation(){
        return $this->belongsTo(FixedSalary::class,'fixedSalaryId','fixedSalaryId');
    }
    public function salaryComponentRelation(){
        return $this->belongsTo(SalaryComponent::class,'salaryComponentId','salaryComponentId');
    }
}
