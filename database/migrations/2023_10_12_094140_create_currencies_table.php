<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('symbol');
            $table->float('exchange');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
