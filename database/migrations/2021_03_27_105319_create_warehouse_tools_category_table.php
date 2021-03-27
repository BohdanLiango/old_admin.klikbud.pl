<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseToolsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_tools_category', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->unique();
            $table->integer('type_id')->nullable(); // 1- Main, 2-half, 3-halfhalf, 4 - halfhalfhalf, 5 - ....
            /**
             * Add Automatic
             */
            $table->string('slug')->nullable()->unique();
            $table->integer('parent_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('moderated_id')->default(2);
            $table->timestamps();
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
        Schema::dropIfExists('warehouse_tools_category');
    }
}
