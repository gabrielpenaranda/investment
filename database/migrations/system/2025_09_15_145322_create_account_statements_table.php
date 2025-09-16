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
        Schema::create('account_statements', function (Blueprint $table) {
            $table->id();
            $table->datetime('date');
            $table->integer('month');
            $table->integer('year');
            $table->string('description');
            $table->decimal('amount', 15, 2);
            $table->decimal('balance', 15, 2);
            $table->enum('type', ['distribution', 'contribution', 'none'])->default('none');
            $table->boolean('approved')->default(false);
            $table->foreignId('investment_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_statements');
    }
};
