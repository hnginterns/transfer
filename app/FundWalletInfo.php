<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundWalletInfo extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'uuid', 'id');
    }
}
