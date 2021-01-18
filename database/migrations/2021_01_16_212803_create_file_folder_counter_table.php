<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileFolderCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_folder_counter', function (Blueprint $table) {
            $table->id();
            $table->longText('group')->nullable();
            $table->longText('sub_group')->nullable();
            $table->integer('s1')->default(0);
            $table->integer('s2')->default(0);
            $table->integer('s3')->default(0);
            $table->integer('s4')->default(0);
            $table->integer('s5')->default(0);
            $table->integer('s6')->default(0);
            $table->integer('s7')->default(0);
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
        Schema::dropIfExists('file_folder_counter');
    }
}
