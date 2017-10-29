<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagGroupsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_groups_users', function (Blueprint $table) {
            $table->integer('tag_id')->unsigned();
            $table->integer('topupcontact_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('topupcontact_id')->references('id')->on('topup_contacts');
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
        Schema::dropIfExists('tag_groups_users');
    }
}
