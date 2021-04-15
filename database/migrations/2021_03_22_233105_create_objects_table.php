<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Nowy Obiekt');
            $table->integer('image_id')->nullable();
            $table->text('description')->nullable(); //Opis
            $table->decimal('price_start', 65,2)->nullable();
            $table->decimal('price_end', 65,2)->nullable();
            $table->float('m2', 65,2)->nullable(); //If this renovation
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->date('final_date_end')->nullable();
            $table->date('guarantee_date_end')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('town_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('address_add_info')->nullable();
            $table->string('number')->nullable();
            $table->string('apartment_number')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('status_object_id')->nullable(); // 1- Актуальний, 2 - Неактуальний, 3 - В процесі, 4 - Інше, 5 - Закритий
            $table->integer('type_object_id')->nullable(); // 1- Квартира 2хата 3 Ресторан
            $table->integer('type_repair_id')->nullable(); // 1 - Девелоперка, 2- Генералка, 3 - Tynki
            $table->integer('client_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('moderated_id')->default(2);
            $table->json('manager_id')->nullable();
            $table->integer('agreement_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
