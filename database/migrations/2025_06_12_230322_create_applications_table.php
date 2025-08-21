<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->contrained('user')->onDelete('cascade');
            $table->foreignId('vacance_id')->contrained('vacance')->onDelete('cascade');
            $table->string('cover_letter_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
