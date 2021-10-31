<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlikbudServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klikbud_service', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status_to_main_page_id')->unsigned()->default(config('klikbud.status.status_to_main_page.not_visible'));
            $table->bigInteger('image_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->json('slug')->nullable();
            $table->json('alt')->nullable();
            $table->json('title')->nullable();
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
        Schema::dropIfExists('klikbud_service');
    }
}
