<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->text('slug')->nullable();
            $table->bigInteger('avatar_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->bigInteger('gender_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('nation_country_id')->nullable();
            $table->integer('nation_state_id')->nullable();
            $table->integer('nation_town_id')->nullable();
            $table->integer('nation_street_id')->nullable();
            $table->string('nation_street_number')->nullable();
            $table->string('nation_apartment_number')->nullable();
            $table->json('phone')->nullable(); // Мобільний телефон
            $table->json('email')->nullable();
            $table->json('social_link_facebook')->nullable();
            $table->json('social_link_instagram')->nullable();
            $table->integer('country_id')->nullable(); // Країна проживання
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('house_number')->nullable();
            $table->string('apartment_number')->nullable();
            $table->date('date_employed')->nullable(); // Дата затруднення
            $table->date('date_release')->nullable(); // Дата Звільнення
            $table->integer('agreement_id')->nullable(); // Умова по роботі
            $table->integer('document_id')->nullable(); // Документ Перебування
            $table->string('nr_document')->nullable(); // Номер документу
            $table->bigInteger('document_residence_id')->nullable(); // Назва документу дозволу роботи
            $table->date('document_residence_date_start')->nullable(); //Дата початку дозволу роботи
            $table->date('document_residence_date_expired')->nullable(); //Дата закінчення дозволу роботи
            $table->bigInteger('status_employee_id')->nullable();  // 1 - затруднений, 2 - звільнний, 3 - найм, 4 - В процесі
            $table->bigInteger('status_work_id')->nullable();  // 1 - Відпочинок, 2 - Працює, 3 - лікарняний
            $table->bigInteger('user_id_add')->nullable();
            $table->bigInteger('user_id')->nullable(); // Ід на зареєстрованого користувача
            $table->bigInteger('user_interview_id')->nullable();
            $table->bigInteger('position_id')->nullable(); // Позиція на фірмі
            $table->longText('description')->nullable();
            $table->json('skills')->nullable();
            $table->integer('moderated_id')->nullable();
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
        Schema::dropIfExists('employee');
    }
}
