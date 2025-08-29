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
        Schema::create('career_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('requirements');
            $table->longText('responsibilities');
            $table->string('location');
            $table->string('department')->nullable();
            $table->string('employment_type'); // Full-time, Part-time, Contract
            $table->string('experience_level')->nullable(); // Entry, Mid, Senior
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->string('salary_currency')->default('USD');
            $table->boolean('is_remote')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('application_deadline')->nullable();
            $table->integer('applications_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_jobs');
    }
};
