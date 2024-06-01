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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('membership_id',128)->nullable()->index();
            $table->string('company_name',128)->nullable();
            $table->string('name',128)->nullable();
            $table->string('email',128)->nullable();
            $table->string('mobile',56)->nullable();
            $table->string('address',150)->nullable();
            $table->enum('auth_rep',['YES','NO'])->index()->nullable();
            $table->string('logo',128)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
