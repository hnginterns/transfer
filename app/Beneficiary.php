<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $guarded =[];


    public function bank(){
        return $this->hasOne(Bank::class,'bank_code','bank_id');
    }
}
