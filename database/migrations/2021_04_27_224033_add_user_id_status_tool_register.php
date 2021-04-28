<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdStatusToolRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status_tool_register', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('status_id');
            $table->integer('user_last_update_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status_tool_register', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('status_id');
            $table->integer('user_last_update_id')->nullable()->after('user_id');
        });
    }
}
