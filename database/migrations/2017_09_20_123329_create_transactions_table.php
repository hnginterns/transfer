<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wallet_code');
            $table->decimal('amount_transfered', 12,2);
            $table->boolean('transaction_status')->default(false);
            $table->integer('payer_uuid')->unsigned();
            $table->integer('payee_uuid')->unsigned();
            $table->string('payee_account_number', 10);
            $table->integer('bank_id')->unsigned();
            $table->string('payee_wallet_code');
            $table->string('transaction_reference', 100)->unique();
            $table->timestamps();

            //$table->foreign('wallet_code')->references('wallet_code')->on('wallets')
                    //->onDelete('cascade')
                    //->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
