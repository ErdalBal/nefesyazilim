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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id')->nullable();
            $table->biginteger('category_id')->unsigned();
            $table->text('content')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_file')->nullable();
            $table->integer('blog_see')->nullable();
            $table->integer('blog_like')->nullable();
            $table->date('publish_date')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
