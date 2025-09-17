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
            
            // Basic Contact Information
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company_name');
            
            // Organisation Details
            $table->string('organisation_type');
            $table->text('address');
            
            // Inquiry Type and Status
            $table->enum('inquiry_type', ['sale_purchase', 'chartering']);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            
            // Vessel Details (Common)
            $table->string('vessel_type');
            $table->integer('year_of_build')->nullable();
            $table->decimal('dwt', 15, 2)->nullable(); // Deadweight Tonnage
            
            // Sale & Purchase Specific Fields
            $table->string('ship_type')->nullable(); // newbuild, second_hand, scrap
            $table->string('build_nation')->nullable();
            $table->decimal('budget', 15, 2)->nullable(); // USD budget
            $table->string('trading_area')->nullable();
            $table->string('delivery_location')->nullable();
            $table->date('timeline')->nullable();
            $table->enum('action', ['buy', 'sale'])->nullable();
            
            // Chartering Specific Fields
            $table->string('charter_type')->nullable(); // voyage_charter, time_charter, bareboat_charter
            $table->date('laycan_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('start_date')->nullable();
            $table->decimal('budget_per_ton', 10, 2)->nullable();
            $table->decimal('budget_per_day', 10, 2)->nullable();
            
            // Freight Details
            $table->string('port_of_loading')->nullable();
            $table->string('port_of_discharge')->nullable();
            $table->string('cargo_type')->nullable();
            $table->decimal('cargo_quantity', 15, 2)->nullable(); // MT
            $table->decimal('load_rate', 10, 2)->nullable();
            $table->decimal('discharge_rate', 10, 2)->nullable();
            
            // Additional Information
            $table->text('additional_notes')->nullable();
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
