<?php

namespace App\Listeners;

use App\Events\TransferToBank;
use App\Wallet;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateWalletBalance
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TransferToBank  $event
     * @return void
     */
    public function handle(TransferToBank $event)
    {
        $walletBalance = \App\Http\Utilities\Wallet::all();

         foreach($walletBalance as $wallets)
        {
            
             Wallet::where('wallet_code', $wallets['uref'])
                ->update(['balance'=> $wallets['balance']]);
    
        }
        
    }
}
