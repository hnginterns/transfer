<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /**
     * Get the list of users using the bank
     *
     * @return 
     */
    public function users() {
        return $this->hasMany('App\User', 'bank_id', 'bank_code');
    }

    /**
     * Get all beneficiaries
     *
     * @return 
     */
    public function beneficiaries() {
        return $this->hasMany('App\Beneficiary', 'bank_id', 'bank_code');
    }

    /**
     * Get all Transactions
     *
     * @return 
     */
    public function transactions() {
        return $this->hasMany('App\Transaction', 'bank_id', 'bank_code');
    }
}
