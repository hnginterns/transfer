<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopupHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topup_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->integer('user_id');
            $table->integer('amount');
            $table->string('type'); // Type of topup: airtime or data
            $table->string('ref');
            $table->string('txn_response');
            $table->string('status');
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
        Schema::dropIfExists('topup_histories');
    }
}
