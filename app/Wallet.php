<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = ['uuid', 'balance', 'wallet_code'];

    /**
     * Get the owner of this wallet
     *
     * @return void
     */
    public function users() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get transactions related to this wallet
     *
     * @return void
     */
    public function transactions() {
        return $this->hasMany('App\Transaction', 'wallet_code', 'wallet_code');
    }

    /**
     * Get Wallet restriction
     *
     * @return void
     */
    public function restrictions() {
        return $this->belongsTo('App\Restriction');
    }

}
