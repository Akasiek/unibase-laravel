<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->dateTime('date')->nullable();
            $table->text('info')->nullable();

            $table->foreignId('event_type_id')->constrained('event_types');
            $table->foreignId('subject_id')->nullable()->constrained('subjects');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
