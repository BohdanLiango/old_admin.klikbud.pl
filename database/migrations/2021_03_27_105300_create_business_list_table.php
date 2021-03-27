<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_list', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('title_short')->nullable();
            $table->bigInteger('image_id')->nullable();
            $table->boolean('is_manufacturer_id')->nullable(); //True / False
            $table->text('description')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('number')->nullable();
            $table->string('apartment_number')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('NIP')->nullable()->unique();
            $table->integer('REGON')->nullable()->unique();
            $table->integer('BDO')->nullable()->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('site')->nullable();
            /**
             * Add automatic
             */
            $table->integer('user_id')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('business_list');
    }
}
