<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admin_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('profession', 250);
            $table->text('profession_description');
            $table->text('journey');
            $table->string('skill_1_name', 250);
            $table->text('skill_1_description');
            $table->string('skill_2_name', 250);
            $table->text('skill_2_description');
            $table->string('skill_3_name', 250);
            $table->text('skill_3_description');
            $table->string('skill_4_name', 250);
            $table->text('skill_4_description');
            $table->string('skill_5_name', 250);
            $table->text('skill_5_description');
            $table->text('my_approach');
            $table->text('lets_connect');
            $table->date('dob');
            $table->integer('age')->nullable();
            $table->string('website', 2048)->nullable();
            $table->string('email', 250)->unique();
            $table->string('degree', 250);
            $table->string('phone', 250);
            $table->string('city', 250);
            $table->string('freelance', 250);
             $table->string('first_language_name')->nullable();
            $table->string('first_language_pct')->nullable(); // This should accept values like '80%'
            $table->string('second_language_name')->nullable();
            $table->string('second_language_pct')->nullable();
            $table->string('third_language_name')->nullable();
            $table->string('third_language_pct')->nullable();
            $table->string('fourth_language_name')->nullable();
            $table->string('fourth_language_pct')->nullable();
            $table->string('first_education_title')->nullable();
            $table->text('first_education_description')->nullable();
            $table->string('second_education_title')->nullable();
            $table->text('second_education_description')->nullable();
            $table->string('third_education_title')->nullable();
            $table->text('third_education_description')->nullable();
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
        Schema::dropIfExists('admin_abouts');
    }
}
