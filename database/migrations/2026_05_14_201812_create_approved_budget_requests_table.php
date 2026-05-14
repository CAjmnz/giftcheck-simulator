<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('approved_budget_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('abr_budget_request_id')->nullable();
            $table->string('abr_approved_by')->nullable();
            $table->string('abr_checked_by')->nullable();
            $table->text('approved_budget_remark')->nullable();
            $table->timestamp('abr_approved_at')->nullable();
            $table->string('abr_file_doc_no')->nullable();
            $table->unsignedBigInteger('abr_prepared_by')->nullable();
            $table->integer('abr_ledgerefnum')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('approved_budget_requests');
    }
};