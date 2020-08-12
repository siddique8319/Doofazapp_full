<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeType extends Model
{
    public function Income(){
        return $this->hasMany(Income::class,'incomeTypeId');
    }
}
