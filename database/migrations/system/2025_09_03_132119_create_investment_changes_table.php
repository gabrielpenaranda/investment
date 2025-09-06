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
        Schema::create('investment_changes', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 12, 2);
            $table->datetime('activation_date');
            $table->datetime('deactivation_date')->nullable();
            $table->decimal('rate', 4, 2);
            $table->decimal('interests', 12, 4);
            $table->foreignId('investment_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_changes');
    }
};
