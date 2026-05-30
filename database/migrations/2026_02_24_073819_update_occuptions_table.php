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
        Schema::table('occupations', function (Blueprint $table) {
            $table->dropColumn('education_level');
            Schema::table('occupations', function (Blueprint $table) {
                $table->foreignId('education_level_id')->constrained('education_levels')->onDelete("restrict")->after('description');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('occupations', function (Blueprint $table) {
            $table->dropColumn('education_level');
        });
    }
};
