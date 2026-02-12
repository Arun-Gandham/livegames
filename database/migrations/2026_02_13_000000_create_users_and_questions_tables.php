<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->text('questions_array'); // serialized array of questions
            $table->text('answer')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('answered_at')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('theme_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
