<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('category_id')->constrained();
            $table->foreignId('brand_id')->constrained();

            // Product basic info
            $table->string('en_name');
            $table->string('slug')->unique();

            // Descriptions
            $table->text('en_desc')->nullable();
            $table->text('en_shipping')->nullable();
            $table->text('en_additionalinfo')->nullable();

            // Flags
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_best_selling')->default(false);
            $table->boolean('is_new_arrival')->default(false);
            $table->boolean('is_onsale')->default(false);

            // Pricing
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('discounted_price', 10, 2)->nullable();

            // Stock & status
            $table->integer('quantity')->default(0);
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
