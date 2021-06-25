<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('number')->nullable();
            $table->string('apartment_number')->nullable();
            $table->string('zip_code')->nullable();
            $table->dateTime('date_rent_start')->nullable();
            $table->dateTime('date_rent_end')->nullable();
            $table->string('square')->nullable();
            $table->decimal('price', 65, 2)->nullable();
            $table->bigInteger('condition_id')->nullable(); // умова винайму
            $table->bigInteger('image_id')->nullable();
            $table->integer('status_warehouse_id')->nullable(); //Aktualny
            /**
             * Add Automatic
             */
            $table->integer('moderated_id')->default(2);
            $table->bigInteger('user_id')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('warehouses');
    }
}
