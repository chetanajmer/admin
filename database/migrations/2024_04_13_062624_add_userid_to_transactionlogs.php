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
        Schema::table('transactionlogs', function (Blueprint $table) {
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('transactions');
            $table->unsignedBigInteger('vendorid');
            $table->foreign('vendorid')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactionlogs', function (Blueprint $table) {
            //
        });
    }
};
