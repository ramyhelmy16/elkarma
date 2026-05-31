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
            $table->foreignId('qualification_id')->nullable()->constrained('qualifications')->onDelete('set null');
            $table->text('requirements')->nullable();
            
            // المؤهلات والخبرة
            $table->foreignId('education_level_id')->constrained('education_levels')->onDelete("restrict");
            $table->foreignId('experience_level_id')->constrained('experience_levels')->onDelete("restrict")->after('description');
            $table->foreignId('job_type_id')->constrained('job_types')->onDelete("restrict")->after('experience_level_id')->after('description');

            // المزايا
            $table->foreignId('insurance_type_id')->constrained('insurance_types')->onDelete("restrict")->after('job_type_id');
            $table->foreignId('extra_benefit_id')->constrained('extra_benefits')->onDelete("restrict")->after('insurance_type_id');

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
            $table->foreignId('applicant_type_id')->constrained('applicant_types')->onDelete("restrict")->after('extra_benefit_id');
            $table->foreignId('gender_id')->constrained('genders')->onDelete("restrict")->after('applicant_type_id');

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
