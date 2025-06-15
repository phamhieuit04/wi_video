<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->integer('follow_id')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('video_id');
            $table->string('comment')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });
        Schema::create('pushes', function (Blueprint $table) {
            $table->id();
            $table->string('content')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('status')->default('wait');
            $table->timestamps();
        });
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_url')->nullable();
            $table->string('caption')->nullable();
            $table->foreignId('author_id')->constrained('users', 'id');
            $table->timestamps();
        });
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('video_id')->constrained('users', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('content')->nullable();
            $table->foreignId('video_id')->constrained('videos', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
