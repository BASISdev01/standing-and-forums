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
        Schema::create('priority', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->string('priority_lable')->nullable();
            $table->string('priority')->nullable();
            $table->string('priority_type')->nullable();
            $table->integer('is_change_participant')->default(0);
            $table->string('par_name')->nullable();
            $table->string('par_designation')->nullable();
            $table->string('par_email')->nullable();
            $table->string('par_phone')->nullable();
            $table->text('priority_relevance_to_committee')->nullable();
            $table->json('priority_support_or_improvement')->nullable();
            $table->json('priority_identified_gaps')->nullable();
            $table->text('priority_three_collaborates')->nullable();
            $table->text('priority_community_or_policy')->nullable();
            $table->integer('priority_contribute_hours')->nullable();
            $table->string('priority_attend_monthly_meeting')->nullable();
            $table->date('approved_date')->nullable();
            $table->date('approved_by')->nullable();
            $table->string('comment')->nullable();
            $table->enum('status',['pending','review ','approved','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priority');
    }
};
