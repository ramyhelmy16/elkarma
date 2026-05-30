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
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_title_id')->constrained('job_titles')->cascadeOnDelete();
            $table->foreignId('company_id')->constrained("companies")->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();

            // المؤهلات والخبرة
            $table->string('education_level');
            $table->string('experience_needed');
            $table->string('job_type');

            // المزايا
            $table->string('insurance_type')->default('بدون');
            $table->string('extra_benefits')->default('بدون');

            // الراتب والمواعيد
            $table->decimal('salary_min', 10, 2)->default(0);
            $table->decimal('salary_max', 10, 2)->default(0);
            $table->date('application_deadline');
            $table->date('expected_start_date');

            // مواعيد العمل والإجازات
            $table->string('working_hours');
            $table->unsignedInteger('vacation_days')->default(21);

            // حوافز
            $table->boolean('incentives')->default(false);

            // متطلبات المتقدم
            $table->string('applicant_type')->default('للجميع');
            $table->string('gender_preference')->default('كلا الجنسين');

            // العمر
            $table->unsignedInteger('age_min')->nullable();
            $table->unsignedInteger('age_max')->nullable();

            // لغات ومهارات
            $table->string('required_languages')->nullable();
            $table->text('required_skills')->nullable();
            $table->text('extra_info')->nullable();

            // الموقع
            $table->foreignId('area_id')->constrained('areas')->cascadeOnDelete();

            // الحالة
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupations');
    }
};
