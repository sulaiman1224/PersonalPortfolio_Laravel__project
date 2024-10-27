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
        Schema::create('admin_official_accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // url
            $table->string('url');
            // name
            $table->string('icon_first_name');
            $table->string('icon_second_name');
            // description
            $table->string('name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_official_accounts');
    }
};
