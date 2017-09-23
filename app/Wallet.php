<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Transaction;
use App\Restriction;
use Illuminate\Support\Facades\Auth;

class Wallet extends Model
{
	// By Timolin - Team-calculon
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
        return $this->belongsTo(User::class);
    }

    /**
     * Get transactions related to this wallet
     *
     * @return void
     */
    public function transactions() {
        return $this->hasMany(Transaction::class, 'wallet_code', 'wallet_code');
    }

    /**
     * Get Wallet restriction
     *
     * @return void
     */
    public function restrictions() {
        return $this->hasOne(Restriction::class);
    }

		/**
		 * Archive wallet
		 *
		 * @return void
		 */
    public function archive() {

        if (Auth::check() && Auth::user()->isAdmin()) {

					$this->archived = 1;

					return true;
        }

				// return redirect()->back()->with('status', 'You\'re not Authorized to perform this action');
				return false;
		}
		
		public function canTransfer() {
			// dd("HEre!");
			
			$restriction = $this->restrictions()->get();

			$rule = \App\Rule::find($restriction[0]->rule_id);

			// Fecth all the transactions in the past 24 hours
			// from the db
			$transactions = $this->transactions()->get();
			// dd($transactions);
			$totalTransactionsToday = 3;

			if ($rule->max_transactions_per_day >= $totalTransactionsToday) {
				return false;
			} else {
				return true;
			}

		}
}
