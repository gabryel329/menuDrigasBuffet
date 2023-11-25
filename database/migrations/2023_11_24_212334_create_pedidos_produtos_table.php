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
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->integer('pedido_id');
            $table->integer('produto_id');
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('pedido_id')
                  ->references('id')->on('pedidos')
                  ->onDelete('cascade');

            $table->foreign('produto_id')
                  ->references('id')->on('produtos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_produtos');
    }
};
