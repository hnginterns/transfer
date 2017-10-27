<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhonetopupTransaction extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'uuid', 'id');
    }

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }

    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
