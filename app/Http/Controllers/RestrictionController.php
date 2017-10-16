<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wallet;

class RestrictionController extends Controller
{
    
    public $failed_rules = [];
    public $restriction;
    public $transfer_details;

    public function __construct($restriction, $transfer_details = null){
        $this->restriction = $restriction;
        $this->transfer_details = $transfer_details;
    }

    public function transferToWallet(){
        $this->canTransferFromWallet();
        $this->canTransferToWallet();
        $this->maxAmount();
        $this->minAmount();
        $this->checkWalletBalance();
        return $this->failed_rules;
    }

    public function canView(){
        $this->canFundWallet();
        $this->canAddBeneficiary();
        $this->canTransferFromWallet();
        return $this->failed_rules;
    }

    public function transferToBank(){
        $this->canTransferFromWallet();
        $this->maxAmount();
        $this->minAmount();
        $this->checkWalletBalanceBank();
        return $this->failed_rules;
    }

    public function checkWalletBalance(){
        $wallet = Wallet::find($this->transfer_details->sourceWallet);
        if($wallet->balance < $this->transfer_details->amount){
            $this->failed_rules['low_balance'] = 'You do not have sufficient fund';
        }
        return $this->failed_rules;
    }

    public function checkWalletBalanceBank(){
        $wallet = Wallet::find($this->transfer_details->wallet_id);
        if($wallet->balance < $this->transfer_details->amount){
            $this->failed_rules['low_balance'] = 'You do not have sufficient fund';
        }
        return $this->failed_rules;
    }

    public function canTransferFromWallet(){

        if(!$this->restriction->can_transfer_from_wallet){
            $this->failed_rules['can_transfer_from_wallet'] = 'Cant transfer from this wallet';
        }
        return $this->failed_rules;
    }

    public function canFundWallet(){

        if(!$this->restriction->can_fund_wallet){
            $this->failed_rules['can_fund_wallet'] = 'Cant fund this wallet';
        }

        return $this->failed_rules;

    }

    public function canAddBeneficiary(){

        if(!$this->restriction->can_add_beneficiary){
            $this->failed_rules['can_add_beneficiary'] = 'Cant add a beneficiary';
        }
        return $this->failed_rules;
    }

    public function canTransferToWallet(){
        
        $raw_wallets = $this->restriction->can_transfer_to_wallets;
        $wallets = json_decode($raw_wallets, true);
        $state = true;
        if($wallets != null){
            foreach($wallets as $key => $value){
                if($value == $this->transfer_details->recipientWallet){
                    $state = false;
                }
            }
        }

        if($state){
            return $this->failed_rules['transfer_to_wallet'] = 'Cant transfer to this wallet';
            
        }   

    }


    public function maxAmount(){

        if($this->transfer_details->amount > $this->restriction->max_amount){
            $this->failed_rules['max_amount'] = "Transfer limit is ".$this->restriction->max_amount;
        }
        return $this->failed_rules;
    }

    public function minAmount(){

        if($this->transfer_details->amount < $this->restriction->min_amount){
            $this->failed_rules['min-amount'] = "Cant transfer lower than ".$this->restriction->min_amount;
        }
            return $this->failed_rules;
    }

    public function fails(){
        return count($this->failed_rules) == 0? false : true;
    }


}
