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
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('month');
            $table->decimal('interest_amount', 12, 4);
            $table->decimal('rate', 4, 2);
            $table->string('serial');
            $table->string('name');
            $table->string('email');
            $table->boolean('approved')->default(false);
            $table->enum('condition', ['paid', 'unpaid'])->default('unpaid');
            $table->enum('status', ['payable', 'cumulative'])->default('payable');
            $table->foreignId('investment_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interests');
    }
};
