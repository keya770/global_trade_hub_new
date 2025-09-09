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
        Schema::create('vessel_inquiries', function (Blueprint $table) {
            $table->id();
            
            // Personal Information
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company_name')->nullable();
            
            // Vessel Specifications
            $table->string('vessel_type');
            $table->decimal('vessel_dwt', 15, 2)->nullable();
            $table->integer('built_year_from')->nullable();
            $table->integer('built_year_to')->nullable();
            $table->string('flag')->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('draft', 8, 2)->nullable();
            
            // Inquiry Details
            $table->enum('inquiry_type', ['purchase', 'sale', 'charter', 'both']);
            $table->decimal('budget_from', 15, 2)->nullable();
            $table->decimal('budget_to', 15, 2)->nullable();
            $table->text('additional_notes')->nullable();
            
            // Status and Management
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->timestamp('processed_at')->nullable();
            
            // Related Vessel (if inquiry is for specific vessel)
            $table->foreignId('vessel_id')->nullable()->constrained()->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessel_inquiries');
    }
};
