<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiary extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded =[];


    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
    