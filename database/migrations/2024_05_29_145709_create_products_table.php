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
            $table->id();
            $table->string('mypime_nit');
            $table->foreign('mypime_nit')->references('nit_mypime')->on('mypimes')->onDelete('cascade');
            $table->string('nombre_product');
            $table->decimal('price_product', 20, 2);
            $table->text('description');
            $table->enum('status', ['disponible', 'no disponible'])->default('disponible');
            $table->string('image')->nullable();
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
