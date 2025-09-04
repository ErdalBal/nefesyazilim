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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('settings_description')->nullable();
            $table->string('settings_key')->nullable();
            $table->string('settings_value')->nullable();
            $table->string('settings_type')->nullable();
            $table->integer('settings_delete')->nullable();
            $table->integer('settings_status');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
