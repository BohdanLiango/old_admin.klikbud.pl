<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUniqueNumberStatusToolRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status_tool_register', function (Blueprint $table) {
            $table->dropColumn('unique_number');
            $table->dropColumn('register_id');
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
            $table->dropColumn('unique_number');
            $table->dropColumn('register_id');
        });
    }
}
