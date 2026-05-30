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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('nid', 100)->unique();
            $table->string('telephone', 20)->nullable();
            $table->string('email')->nullable();
            $table->date('dob');

            $table->string('education')->default('بدون');

            $table->foreignId('qualification_id')->constrained('qualifications')->cascadeOnDelete();
            $table->string('field_of_study', 100)->nullable();
            $table->integer('graduation_year')->nullable();
            $table->string('address', 200)->nullable();

            $table->foreignId('area_id')->constrained('areas')->cascadeOnDelete();

            $table->string('nid_image')->nullable();
            $table->string('client_image')->nullable();
            $table->string('resume')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
