<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternetBankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_bankings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('status');
            $table->string('ip');
            $table->integer('amount');
            $table->string('reference');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('bank_name');
            $table->integer('uuid');
            $table->string('type');
            $table->string('wallet_code');
            $table->string('source');
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
        Schema::dropIfExists('internet_bankings');
    }
}
