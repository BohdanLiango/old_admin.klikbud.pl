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
            $table->text('group')->nullable();
            $table->text('sub_group')->nullable();
            $table->integer('s1')->default(1);
            $table->integer('s2')->default(1);
            $table->integer('s3')->default(1);
            $table->integer('s4')->default(1);
            $table->integer('store')->default(0);
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
