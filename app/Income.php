<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function IncomeRelation(){
        return $this->belongsTo(IncomeType::class,'incomeTypeId','incomeTypeId');
    }
}
