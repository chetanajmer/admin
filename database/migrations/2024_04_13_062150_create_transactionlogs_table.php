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
        Schema::create('transactionlogs', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 9,2)->default(0);
            $table->unsignedBigInteger('transactionid');
            $table->foreign('transactionid')->references('id')->on('transactions');
            $table->enum('type',['Credit','Debit'])->default('Debit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactionlogs');
    }
};
