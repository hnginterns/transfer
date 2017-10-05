<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uuid')->unsigned();
            $table->decimal('balance_one', 12, 2);
            $table->decimal('balance', 12, 2);
            $table->string('wallet_name');
            $table->integer('merchant_id')->unsigned();
            $table->string('lock_code',100);
            $table->integer('moneywave_wallet_id')->unsigned();
            $table->boolean('enabled');
            $table->integer('currency_id')->unsigned();
            $table->string('wallet_code',10)->unique();
            $table->boolean('archived')->default(false);
            $table->softDeletes();
            $table->timestamps();
    
            $table->foreign('uuid')->references('id')->on('users')
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
        Schema::dropIfExists('wallets');
    }
}
