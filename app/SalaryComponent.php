<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryComponent extends Model
{
    public function salaryComponentInfo(){
        return $this->hasMany(SalaryComponentInformation::class,'salaryComponentId');
    }
}
