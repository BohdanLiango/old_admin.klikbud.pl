<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlikbudCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klikbud_counter', function (Blueprint $table) {
            $table->id();
            $table->integer('project_completed')->default(0);
            $table->integer('happy_clients')->default(0);
            $table->integer('workers_employed')->default(0);
            $table->integer('awards_won')->default(0);
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
        Schema::dropIfExists('klikbud_counter');
    }
}
