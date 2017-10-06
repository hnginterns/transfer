<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestrictionValidationController extends Controller
{
    
    public $failed_rules = [];
    public $restriction;
    public $transfer_details;

    public function __construct($restriction, $transfer_details){
        $this->restriction = $restriction;
        $this->transfer_details = $transfer_details;
    }

    public function validate(){
        $this->canTransferFromWallet();
        $this->canFundWallet();
        $this->canAddBeneficiary();
        $this->canTransferToWallet();
        $this->maxAmount();
        $this->minAmount();
        return $this->failed_rules;
    }

    public function canTransferFromWallet(){

        if(!$this->restriction->can_transfer_from_wallet){
            $this->failed_rules[] = 'Cant transfer to from this wallet';
        }

    }

    public function canFundWallet(){

        if(!$this->restriction->can_fund_wallet){
            $this->failed_rules[] = 'Cant fund this wallet';
        }

    }

    public function canAddBeneficiary(){

        if(!$this->restriction->can_add_beneficiary){
            $this->failed_rules[] = 'Cant add a beneficiary';
        }

    }

    public function canTransferToWallet(){

        $raw_wallets = $this->restrictions->can_transfer_to_wallets;
        $wallets = json_decode($raw_wallets, true);
        $state = false;
        if($this->restrictions->can_transfer_to_wallets != null){
            foreach($wallets as $key => $value){
                if($value == $this->transfer_details->beneficiary_wallet_id){
                    $state = true;
                }
            }
        }

        if($state){
            $this->failed_rules = 'Cant transfer to this wallet';
        }   

    }


    public function maxAmount(){

        if($this->transfer_details->amount > $this->restriction->max_amount){
            $this->failed_rules[] = "Transfer limit is ".$this->restriction->max_amount;
        }

    }

    public function minAmount(){

        if($this->transfer_details->amount < $this->restriction->min_amount){
            $this->failed_rules[] = "Cant transfer lower than ".$this->restriction->min_amount;
        }

    }


}
