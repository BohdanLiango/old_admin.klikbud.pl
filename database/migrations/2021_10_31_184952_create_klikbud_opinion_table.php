<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlikbudOpinionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klikbud_opinion', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('service_id')->unsigned()->nullable();
            $table->tinyInteger('stars')->unsigned()->nullable();
            $table->tinyInteger('status_to_main_page_id')->unsigned()->default(config('klikbud.status.status_to_main_page.not_visible')); // 1 - Active in main page 2 - Hidden
            $table->tinyInteger('is_new_id')->unsigned()->default(false); // New where client send new opinion in site
            $table->bigInteger('reader_id')->nullable(); //If status is new id
            $table->integer('portal_opinion_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->tinyInteger('moderated_id')->unsigned()->default(config('klikbud.moderated.to_moderation'));
            $table->mediumText('opinion')->nullable();
            $table->dateTime('date_add')->nullable();
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
        Schema::dropIfExists('klikbud_opinion');
    }
}
