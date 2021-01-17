<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->longText('to_table');
            $table->longText('slug');
            $table->bigInteger('table_record_id');
            $table->longText('name');
            $table->longText('group');
            $table->longText('folder');
            $table->longText('path');
            $table->longText('size');
            $table->longText('mime');
            $table->integer('file_type_id');
            $table->longText('unique_number');
            $table->integer('moderated_id')->default(3);
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
        Schema::dropIfExists('file');
    }
}
