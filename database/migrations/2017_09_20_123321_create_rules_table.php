<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rule_name', 20);
            $table->boolean('can_transfer')->default(true);
            $table->boolean('can_transfer_external')->default(false);
            $table->decimal('max_amount', 12, 2);
            $table->decimal('min_amount', 12, 2);
            $table->integer('max_transactions_per_day')->unsigned();
            $table->decimal('max_amount_transfer_per_day', 12, 2);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
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
        Schema::dropIfExists('rules');
    }
}
