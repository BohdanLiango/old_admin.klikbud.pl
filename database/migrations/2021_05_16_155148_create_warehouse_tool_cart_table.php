<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseToolCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_tool_cart', function (Blueprint $table) {
            $table->id();
            $table->json('items')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_tool_cart');
    }
}
