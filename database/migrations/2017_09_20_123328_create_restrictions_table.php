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
            $table->boolean('can_transfer')->default(true);
            $table->boolean('can_transfer_external')->default(false);
            $table->decimal('max_amount', 12, 2);
            $table->decimal('min_amount', 12, 2);
            $table->integer('wallet_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('wallet_id')->references('id')->on('wallets')
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
