<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('status_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender_id')->nullable(); // Other - other gender
            $table->integer('company_id')->nullable();
            $table->json('mobile')->nullable();
            $table->json('email')->nullable();
            $table->text('site')->nullable();
            $table->json('language')->nullable();
            $table->string('timezone')->nullable();
            $table->json('communication')->nullable(); // 0 - email, 1 - sms, 2 -phone
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('town_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('add_info_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('number_house')->nullable();
            $table->string('number_flat')->nullable();
            $table->text('description')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('moderated_id')->default(2);
            $table->timestamps();
            $table->softDeletes();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
