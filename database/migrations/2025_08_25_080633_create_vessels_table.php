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
        Schema::create('vessels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // Cargo, Tanker, Container, etc.
            $table->text('description');
            $table->string('image')->nullable();
            $table->decimal('capacity', 10, 2)->nullable(); // in tons
            $table->decimal('length', 8, 2)->nullable(); // in meters
            $table->decimal('width', 8, 2)->nullable(); // in meters
            $table->decimal('draft', 6, 2)->nullable(); // in meters
            $table->decimal('daily_rate', 10, 2)->nullable(); // in USD
            $table->string('flag')->nullable();
            $table->year('built_year')->nullable();
            $table->string('imo_number')->nullable();
            $table->boolean('is_available')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessels');
    }
};
