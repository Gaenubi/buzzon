<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cat;
use App\Models\Subcat;
use App\Models\Product;
use App\Models\Seller;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('subcats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cat::class);
            $table->string('name');
            $table->timestamps();
        });



        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subcat::class);
            $table->foreignIdFor(Seller::class);
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('image');
            $table->string('stripe_id')->nullable();
            $table->string('price_id')->nullable();
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
