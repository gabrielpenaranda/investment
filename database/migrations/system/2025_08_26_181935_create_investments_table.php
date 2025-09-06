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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->decimal('investment_amount', 12, 2);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            /* $table->datetime('opening_date');
            $table->datetime('closing_date')->nullable(); */
            $table->boolean('is_active')->default(true);
            $table->datetime('activation_date')->nullable();
            $table->datetime('deactivation_date')->nullable();
            $table->boolean('capitalize')->default(false);
            $table->string('serial')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
