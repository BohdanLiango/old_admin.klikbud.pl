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
            $table->integer('type_id')->nullable(); //dep, list
            $table->text('title')->nullable(); //dep, list
            $table->string('title_short')->nullable(); //dep, list
            $table->integer('business_form_id')->nullable(); // list
            $table->string('business_form_other')->nullable(); // list
            $table->bigInteger('image_id')->nullable(); // list
            $table->boolean('is_manufacturer')->nullable(); //True / False  // list
            $table->text('description')->nullable(); //dep, list
            $table->integer('category_id')->nullable();  //dep, list
            $table->integer('country_id')->nullable(); //dep, list
            $table->integer('state_id')->nullable(); //dep, list
            $table->integer('town_id')->nullable(); //dep, list
            $table->integer('street_id')->nullable();  //dep, list
            $table->string('number')->nullable();  //dep, list
            $table->string('apartment_number')->nullable();  //dep, list
            $table->string('zip_code')->nullable();  //dep, list
            $table->string('NIP')->nullable()->unique(); // list
            $table->string('REGON')->nullable()->unique(); // list
            $table->string('BDO')->nullable()->unique(); // list
            $table->string('email')->nullable(); //dep, list
            $table->string('phone')->nullable(); //dep, list
            $table->string('site')->nullable(); //dep, list
            $table->integer('business_id')->nullable(); // dep
            /**
             * Add automatic
             */
            $table->integer('user_id')->nullable(); //dep, list
            $table->text('slug')->nullable(); //dep, list
            $table->integer('moderated_id')->default(2); //dep, list
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
