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
            $table->integer('bank_id')->nullable()->unsigned();
            $table->string('account_number')->nullable();
            $table->integer('created_by')->unsigned();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('role_id')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->string('status', 20)->index()->nullable();
            $table->softDeletes();
            $table->integer('updated_by')->nullable()->unsigned();
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
