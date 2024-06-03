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
            $table->string('company_name');
            $table->string('company_address');
            $table->string('par_facebook_link')->nullable();
            $table->string('par_linkedIn_link')->nullable();
            $table->integer('year')->nullable();
            $table->date('submitted_date')->nullable();
            $table->string('is_agree')->nullable();
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
