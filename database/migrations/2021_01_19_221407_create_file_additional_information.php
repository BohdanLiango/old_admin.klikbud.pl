<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAdditionalInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_additional_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('file_id');
            $table->bigInteger('user_id');
            $table->longText('full_path');
            $table->longText('to_table');
            $table->bigInteger('table_record_id');
            $table->longText('name');
            $table->longText('folder');
            $table->longText('path');
            $table->string('size');
            $table->string('mime');
            $table->integer('file_type_id');
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
        Schema::dropIfExists('file_additional_information');
    }
}
