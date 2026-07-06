<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            if (!Schema::hasColumn('products', 'sku')) {

                $table->string('sku')->nullable();

            }

            if (!Schema::hasColumn('products', 'thumbnail')) {

                $table->string('thumbnail')->nullable();

            }

            if (!Schema::hasColumn('products', 'featured')) {

                $table->boolean('featured')->default(false);

            }

            if (!Schema::hasColumn('products', 'best_seller')) {

                $table->boolean('best_seller')->default(false);

            }

            if (!Schema::hasColumn('products', 'new_arrival')) {

                $table->boolean('new_arrival')->default(false);

            }

            if (!Schema::hasColumn('products', 'status')) {

                $table->boolean('status')->default(true);

            }

        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'sku',
                'thumbnail',
                'featured',
                'best_seller',
                'new_arrival',
                'status',
            ]);

        });
    }
};