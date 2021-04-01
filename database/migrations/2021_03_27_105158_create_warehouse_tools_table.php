<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_tools', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('half_category_id')->nullable();
            $table->integer('main_category_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('box_id')->nullable();

            $table->date('purchase_date')->nullable();
            $table->decimal('price', 65,2)->nullable()->default(1.00);
            $table->string('serial_number')->nullable();
            $table->bigInteger('business_departments_id')->nullable(); // Де куплявся
            $table->bigInteger('manufacturer_id')->nullable(); // Виробник
            $table->date('guarantee_date_end')->nullable(); // дата закынчення гарантії, дата початку = даті закупки
            $table->bigInteger('guarantee_file_id')->nullable();
            /**
             * Add Automatic
             */
            $table->integer('status_tool_id')->default(1); // 1 - Active, 2-непрацює, 3 - in repair , 4 - видалений. проданий. знищений
            $table->text('status_description')->nullable(); /// Inne
            $table->text('slug')->nullable();
            $table->integer('moderated_id')->default(2);
            $table->bigInteger('user_id')->nullable();
            $table->boolean('is_box')->nullable(); //Tru false
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
        Schema::dropIfExists('warehouse_tools');
    }
}
