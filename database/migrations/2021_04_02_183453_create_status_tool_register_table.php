<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusToolRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_tool_register', function (Blueprint $table) {
            $table->id();
            $table->integer('register_id')->nullable();
            $table->integer('tool_id')->nullable();
            $table->string('table')->nullable();
            $table->string('table_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('unique_number')->nullable();
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
        Schema::dropIfExists('status_tool_register');
    }
}
