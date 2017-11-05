<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCardWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_wallets', function (Blueprint $table){
            $table->integer('uuid');
            $table->string('card_no');
            $table->string('card_owner');
            $table->string('charge_response');
            $table->string('disburse_response');
            $table->string('ip');
            $table->boolean('pendingValidation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
