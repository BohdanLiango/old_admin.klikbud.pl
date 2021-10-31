<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlikbudOpinionPortalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klikbud_opinion_portal', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('url');
            $table->bigInteger('user_id');
            $table->bigInteger('image_id')->nullable();
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
        Schema::dropIfExists('klikbud_opinion_portal');
    }
}
