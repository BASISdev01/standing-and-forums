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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('membership_id');
            $table->string('par_facebook_link')->nullable();
            $table->string('par_linkedIn_link')->nullable();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('first_priority');
            $table->string('first_priority_type');
            $table->string('first_par_name');
            $table->string('first_par_designation');
            $table->string('first_par_email');
            $table->string('first_par_phone');
            $table->text('first_priority_relevance_to_committee');
            $table->json('first_priority_support_or_improvement');
            $table->json('first_priority_identified_gaps');
            $table->text('first_priority_three_collaborates')->nullable();
            $table->text('first_priority_community_or_policy');
            $table->integer('first_priority_contribute_hours');
            $table->string('first_priority_attend_monthly_meeting');
            $table->string('second_priority')->nullable();
            $table->string('second_priority_type')->nullable();
            $table->string('second_par_name')->nullable();
            $table->string('second_par_designation')->nullable();
            $table->string('second_par_email')->nullable();
            $table->string('second_par_phone')->nullable();
            $table->text('second_priority_relevance_to_committee')->nullable();
            $table->json('second_priority_support_or_improvement')->nullable();
            $table->json('second_priority_identified_gaps')->nullable();
            $table->text('second_priority_three_collaborates')->nullable();
            $table->text('second_priority_community_or_policy')->nullable();
            $table->integer('second_priority_contribute_hours')->nullable();
            $table->string('second_priority_attend_monthly_meeting')->nullable();
            $table->string('is_agree')->nullable();
            $table->enum('status',['pending','review ','approved','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
