<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wallet_id');
            $table->decimal('amount', 12,2);
            $table->boolean('transaction_status')->default(false);
            $table->integer('uuid')->unsigned();
            $table->string('narration')->nullable();
            $table->integer('beneficiary_id')->unsigned();
            $table->string('transaction_reference', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_transactions');
    }
}
