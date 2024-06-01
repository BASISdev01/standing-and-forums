<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_lists', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 200)->index();
            $table->string('membership_no', 30)->index();
            $table->string('logo', 180);
            $table->string('name', 150);
            $table->string('email', 180);
            $table->string('mobile', 20);
            $table->string('image', 180);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_lists');
    }
};
