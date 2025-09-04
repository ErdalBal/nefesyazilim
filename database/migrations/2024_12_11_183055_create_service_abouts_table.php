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
        Schema::create('service_abouts', function (Blueprint $table) {
            $table->id();
            $table->date('service_start')->nullable();
            $table->date('service_finish')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('status',['0','1'])->default('1')->comment('0=>pasif 1=>aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_abouts');
    }
};
