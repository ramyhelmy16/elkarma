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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->cascadeOnDelete();
            $table->string('company', 200);
            $table->foreignId('job_title_id')->nullable()->constrained('job_titles')->onDelete('set null');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('currently_working')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};