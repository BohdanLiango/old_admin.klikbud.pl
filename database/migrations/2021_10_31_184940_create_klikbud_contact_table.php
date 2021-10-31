<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlikbudContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klikbud_contact', function (Blueprint $table) {
            $table->id();
            $table->text('user_name')->nullable();
            $table->text('email')->nullable();
            $table->text('message')->nullable();
            $table->bigInteger('user_read_id')->unsigned()->nullable();
            $table->tinyInteger('status_id')->unsigned()->default(config('klikbud.status.status_contact.new'));
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
        Schema::dropIfExists('klikbud_contact');
    }
}
