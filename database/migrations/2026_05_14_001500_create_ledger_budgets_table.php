<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ledger_budgets', function (Blueprint $table) {
            $table->id();

            $table->string('bledger_no')->nullable();
            $table->unsignedBigInteger('bledger_trid')->nullable();
            $table->dateTime('bledger_datetime')->nullable();
            $table->string('bledger_type')->nullable();

            $table->decimal('bdebit_amt', 15, 2)->default(0);
            $table->decimal('bcredit_amt', 15, 2)->default(0);

            $table->string('bledger_typeid')->nullable();
            $table->string('bledger_group')->nullable();
            $table->string('bledger_category')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ledger_budgets');
    }
};