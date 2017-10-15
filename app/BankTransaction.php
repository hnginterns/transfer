<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    
    use Notifiable;

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }
}
