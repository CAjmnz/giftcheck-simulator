<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('budget_requests', function (Blueprint $table) {
            $table->id();
            $table->string('br_no')->unique();
            $table->decimal('br_request', 15, 2);
            $table->unsignedBigInteger('br_requested_by');
            $table->unsignedBigInteger('br_checked_by')->nullable();
            $table->timestamp('br_requested_at')->nullable();
            $table->date('br_requested_needed')->nullable();
            $table->text('br_remarks')->nullable();
            $table->tinyInteger('br_request_status')->default(0); // 0 pending, 1 approved, 2 cancelled
            $table->string('br_group')->nullable();
            $table->string('br_category')->nullable();
            $table->unsignedBigInteger('br_budtype')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budget_requests');
    }
};