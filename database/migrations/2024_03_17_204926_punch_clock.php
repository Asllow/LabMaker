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
        Schema::create('punch_clock', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registration')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->boolean('io');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punch_clock');
    }
};
