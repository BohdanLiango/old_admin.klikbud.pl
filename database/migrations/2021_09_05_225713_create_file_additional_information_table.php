<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAdditionalInformationTable extends Migration
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
            $table->text('full_path');
            $table->text('to_table');
            $table->bigInteger('table_record_id');
            $table->text('name');
            $table->text('folder');
            $table->text('path');
            $table->string('size');
            $table->string('mime');
            $table->tinyInteger('file_type_id')->unsigned();
            $table->tinyInteger('moderated_id')->unsigned()->default(3);
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
