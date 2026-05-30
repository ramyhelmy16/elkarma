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
        Schema::table('applicants', function (Blueprint $table) {
            $table->foreignId('education_level_id')->constrained('education_levels')->onDelete("restrict")->after('description');
            $table->foreignId('gender_id')->nullable()->constrained('genders')->onDelete('set null')->after('education_level_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropForeign(['education_level_id']);
            $table->dropForeign(['gender_id']);
            $table->dropColumn('education_level_id');
            $table->dropColumn('gender_id');
        });
    }
};
