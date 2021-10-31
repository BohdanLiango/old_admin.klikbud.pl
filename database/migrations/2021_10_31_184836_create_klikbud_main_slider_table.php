<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlikbudMainSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klikbud_main_slider', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status_to_main_page_id')->unsigned()->default(config('klikbud.status.status_to_main_page.not_visible'));
            $table->integer('slider_number_show')->nullable(); //1,2,3; 0 - default
            $table->bigInteger('image_id')->unsigned()->nullable(); //id
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->json('alt')->nullable();
            $table->json('textYellow')->nullable();
            $table->json('textBlack')->nullable();
            $table->json('description')->nullable();
            $table->tinyInteger('moderated_id')->unsigned()->default(config('klikbud.moderated.to_moderation'));
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klikbud_main_slider');
    }
}
