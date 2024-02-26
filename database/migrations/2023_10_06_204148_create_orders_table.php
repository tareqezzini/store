<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->float('total_amount');
            $table->integer('quantity');
            $table->float('delivery_charge')->default(6);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');

            $table->string('method_payment')->default('cod');
            $table->enum('status_payment', ['paid', 'unpaid'])->default('unpaid');
            $table->enum('status_order', ['pending', 'process', 'delivered', 'cancelled'])->default('pending');

            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('code_postal');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
