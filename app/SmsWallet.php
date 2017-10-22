<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsWallet extends Model
{
    protected $fillable= ['username', 'api_key', 'bank_code', 'bank_account'];
}
