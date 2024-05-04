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
        Schema::create('id_maker', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registration')->unsigned()->nullable();
            $table->string('hexa_id');
            $table->boolean('io');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_maker');
    }
};
