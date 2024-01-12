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
            $table->bigIncrements('id')->from(100001);
            $table->uuid('uuid');
            $table->foreignId('parent_category_id')->nullable()->references('id')->on('categories');
            $table->foreignId('child_category_id')->nullable()->references('id')->on('categories');
            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('unit')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->text('summary')->nullable();
            $table->decimal('price_original', 13,2);
            $table->decimal('price_discounted', 13,2)->nullable();
            $table->string('availability');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
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
