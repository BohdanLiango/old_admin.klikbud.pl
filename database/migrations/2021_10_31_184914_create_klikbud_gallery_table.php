<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlikbudGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klikbud_gallery', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('object_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->tinyInteger('status_gallery_id')->unsigned()->default(config('klikbud.status.status_to_gallery.not_visible'));
            $table->tinyInteger('status_to_main_page_id')->unsigned()->default(config('klikbud.status.status_to_main_page.not_visible'));
            $table->bigInteger('image_id')->unsigned()->nullable();
            $table->json('slug')->nullable();
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('alt')->nullable();
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
        Schema::dropIfExists('klikbud_gallery');
    }
}
