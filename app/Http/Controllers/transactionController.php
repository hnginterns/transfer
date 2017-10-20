<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Carbon\Carbon;

class transactionController extends Controller
{
    public function toBankSuccess()
    {
        return view('/transactionsuccess');
    }

    public function toBankFailed()
    {
        return view('/transfer-to-bank');
    }

    // Retrieve transactions from wallets and transactions collections
    public static function getTransactionsHistory($walletz, $wallet, $bank, $wallet_code, $wallet_id) {

        $history = collect();

         $walletz->each(function($source) use ($history) {
            // dd($wallet->toArray());
            // Wallet to wallet
            $history->push(collect([
                'transaction_type' => 'Wallet',
                'transaction_state' => $source->payee_wallet_code == $source->wallet_code ? 'Sending' : 'Receiving',
                'transaction_date' => $source->created_at->toFormattedDateString(),
                'transaction_amount' => $source->amount,
                'transaction_status' => $source->status
            ]));
        });

        $wallet->each(function($wallet) use ($history) {
            // dd($wallet->toArray());
            // Wallet to wallet
            $history->push(collect([
                'transaction_type' => 'Wallet',
                'transaction_state' => $wallet->payee_wallet_code == $wallet->wallet_code ? 'Sending' : 'Receiving',
                'transaction_date' => $wallet->created_at->toFormattedDateString(),
                'transaction_amount' => $wallet->amount,
                'transaction_status' => $wallet->status
            ]));
        });

        $bank->each(function($bank) use ($history) {
            $history->push(collect([
                'transaction_type' => 'Bank',
                'transaction_state' => 'Sending',
                'transaction_date' => $bank->created_at->toFormattedDateString(),
                'transaction_amount' => $bank->amount,
                'transaction_status' => $bank->transaction_status
            ]));
        });

        return $history;
    }
}
