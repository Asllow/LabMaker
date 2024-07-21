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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_produto');
            $table->string('nome_produto');
            $table->text('desc_produto');
            $table->string('dimensao_produto');
            $table->string('img_produto');
            $table->string('pix_produto')->nullable();
            $table->float('preco_produto', "9", "2")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
