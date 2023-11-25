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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('total', 250)->nullable();
            $table->string('nome', 150)->nullable();
            $table->string('cpf', 25)->nullable();
            $table->string('telefone', 25)->nullable();
            $table->integer('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->integer('forma_pagamento_id')->nullable();
            $table->foreign('forma_pagamento_id') ->references('id')->on('forma_pagamentos')->onDelete('cascade');
            $table->string('obs', 1000)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
