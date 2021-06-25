<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusWarehouseToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warehouse_tools', function (Blueprint $table) {
            $table->string('status_table')->nullable()->after('is_box');
            $table->string('status_table_id')->nullable()->after('status_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warehouse_tools', function (Blueprint $table) {
            $table->string('status_table')->nullable()->after('is_box');
            $table->string('status_table_id')->nullable()->after('status_table');
        });
    }
}
