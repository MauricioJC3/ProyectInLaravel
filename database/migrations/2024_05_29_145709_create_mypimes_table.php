<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mypimes', function (Blueprint $table) {
            $table->id();
            $table->string('nit_mypime')->unique();
            $table->string('name_mypime');
            $table->string('photo')->nullable();
            $table->string('address_mypime');
            $table->string('phone_mypime');
            $table->string('email_mypime');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mypimes');
    }
};
