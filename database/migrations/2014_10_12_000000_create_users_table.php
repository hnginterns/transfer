<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable()->index();
            $table->string('email',40)->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->integer('bank_id')->unsigned();
            $table->string('account_number')->unique();
            $table->integer('created_by')->unsigned();
            $table->softDeletes();
            $table->integer('updated_by')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
