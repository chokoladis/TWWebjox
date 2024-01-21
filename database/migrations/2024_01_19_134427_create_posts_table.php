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
            $table->string('title', 50);
            $table->text('detail');            
            // 
            $table->unsignedBigInteger('category_id')->nullable()->default(null);
            $table->index('category_id', 'posts_category_idx');
            $table->foreign('category_id', 'posts_categories_fk')->references('id')->on('categories');
            $table->unsignedBigInteger('file_id');
            $table->index('file_id', 'posts_file_idx');
            $table->foreign('file_id', 'posts_files_fk')->references('id')->on('files');
            // 
            $table->boolean('active')->default(1);

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
