<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('occupations', function (Blueprint $table) {
            $table->dropColumn('experience_needed');
            $table->dropColumn('job_type');
            $table->dropColumn('insurance_type');
            $table->dropColumn('extra_benefits');
            $table->dropColumn('applicant_type');
            $table->dropColumn('gender_preference');

            Schema::table('occupations', function (Blueprint $table) {
                $table->foreignId('experience_level_id')->constrained('experience_levels')->onDelete("restrict")->after('description');
                $table->foreignId('job_type_id')->constrained('job_types')->onDelete("restrict")->after('experience_level_id')->after('description');
                $table->foreignId('insurance_type_id')->constrained('insurance_types')->onDelete("restrict")->after('job_type_id');
                $table->foreignId('extra_benefit_id')->constrained('extra_benefits')->onDelete("restrict")->after('insurance_type_id');
                $table->foreignId('applicant_type_id')->constrained('applicant_types')->onDelete("restrict")->after('extra_benefit_id');
                $table->foreignId('gender_id')->constrained('genders')->onDelete("restrict")->after('applicant_type_id');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('occupations', function (Blueprint $table) {
            $table->dropColumn('experience_needed');
            $table->dropColumn('job_type');
            $table->dropColumn('insurance_type');
            $table->dropColumn('extra_benefits');
            $table->dropColumn('applicant_type');
            $table->dropColumn('gender_preference');
        });
    }
};
