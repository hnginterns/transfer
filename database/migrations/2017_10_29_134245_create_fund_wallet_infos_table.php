<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundWalletInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_wallet_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uuid')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phonenumber');
            $table->string('email');
            $table->timestamps();
            $table->foreign('uuid')->references('id')
                    ->on('users')->onDelete('cascade')
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
        Schema::dropIfExists('fund_wallet_infos');
    }
}
