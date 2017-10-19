<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonetopupTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phonetopup_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uuid')->unsigned();
            $table->string('account_number');
            $table->integer('wallet_id')->nsigned();
            $table->integer('bank_id')->unsigned();
            $table->string('account_name');
            $table->decimal('amount', 12, 2);
            $table->boolean('status')->default(false);
            $table->timestamps();


            $table->foreign('uuid')->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phonetopup_transactions');
    }
}
