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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // name , email,subject,message
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            // status default
            $table->enum('status', ['not seen', 'seen'])->default('not seen');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
