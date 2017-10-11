<?php

  namespace App\Facades;

  use App\Transaction;

  class Trs {
    public static function Log($data) {
      $transaction = new Transaction;
      foreach ($data as $key => $value) {
        $transaction->{$key} = $value;
      }

      $transaction->save();
    }
  }
