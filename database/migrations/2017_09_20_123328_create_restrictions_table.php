<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestrictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restrictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wallet_id')->unsigned();
            $table->integer('uuid')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->boolean('can_transfer_from_wallet')->default(false);
            $table->boolean('can_fund_wallet')->default(false);
            $table->boolean('can_add_beneficiary')->default(false);
            $table->text('can_transfer_to_wallets')->nullable();
            $table->decimal('max_amount', 12, 2);
            $table->decimal('min_amount', 12, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['uuid','wallet_id']);

            $table->foreign('wallet_id')->references('id')->on('wallets')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
        Schema::dropIfExists('restrictions');
    }
}
