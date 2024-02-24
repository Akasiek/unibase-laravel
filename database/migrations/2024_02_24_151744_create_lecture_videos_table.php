<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lecture_videos', function (Blueprint $table) {
            $table->id();

            $table->string('youtube_link');
            $table->foreignId('lecture_id')->constrained('lectures');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lecture_videos');
    }
};
