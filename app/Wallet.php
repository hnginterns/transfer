<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Transaction;
use App\Restriction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
class Wallet extends Model
{

    use SoftDeletes;
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
        return $this->belongsTo(User::class, 'uuid');
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
     * Get Wallet restriction
     *
     * @return void
     */
    public function beneficiary() {
        return $this->hasMany(Beneficiary::class);
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
        
    public function unArchive() {
            
        if (Auth::check() && Auth::user()->isAdmin()) {
         
            $this->archived = 0;
            
                 return true;
            }
            
            return false;
        }
		
		public function canTransfer() {
            
            $restriction = $this->restrictions()->get();

            $rule = \App\Rule::find($restriction[0]->rule_id);

            // Fecth all the transactions in the past 24 hours from the db
            $twentyFourHoursAgo = Carbon::now()->subHours(24);
            $transactions = Transaction::where('wallet_code', $this->wallet_code)
                                // ->orWhere('payee_wallet_code', $this->wallet_code) // Uncomment this line to include recieved transactions
                                ->where('transaction_status', 1)
                                ->where('created_at', '>=', $twentyFourHoursAgo)
                                ->get();

            $totalTransactionsToday = count($transactions);

            if ($rule->max_transactions_per_day <= $totalTransactionsToday) {
                return false;
            } else {
                return true;
            }

        }
}
