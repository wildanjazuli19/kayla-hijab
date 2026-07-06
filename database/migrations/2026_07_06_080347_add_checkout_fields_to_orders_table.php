<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('shipping_method')->nullable();

            $table->string('shipping_service')->nullable();

            $table->integer('shipping_cost')->default(0);

            $table->string('estimated_delivery')->nullable();

            $table->string('payment_method')->nullable();

            $table->string('payment_provider')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'shipping_method',
                'shipping_service',
                'shipping_cost',
                'estimated_delivery',
                'payment_method',
                'payment_provider',
            ]);

        });
    }
};