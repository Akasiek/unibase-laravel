<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->string('summary')->nullable();
            $table->string('notion_link')->nullable();
            $table->foreignId('subject_id')->constrained('subjects');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
