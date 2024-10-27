<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_homes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Name',50);
            $table->string('F_letter',50);
            $table->string('Skip_F_letter',50);
            $table->string('Profession_1',50);
            $table->string('Profession_2',50);
            $table->string('Profession_3',50);
            $table->text('Descreption');
            $table->string('Cv')->nullable();
            $table->string('ProfileImage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_homes');
    }
};
