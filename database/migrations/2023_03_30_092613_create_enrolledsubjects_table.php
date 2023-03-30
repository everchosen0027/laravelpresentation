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
        Schema::create('enrolled_subjects', function (Blueprint $table) {
            $table->id('esNo');
            $table->string('subjectCode', 12);
            $table->string('description', 100);
            $table->smallInteger('units');
            $table->string('schedule', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolled_subjects');
    }
};
