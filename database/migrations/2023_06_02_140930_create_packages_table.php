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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->comment('标题');
            $table->string('text_color', 20)->comment('文字颜色');
            $table->string('bg_color', 20)->comment('文字颜色');
            $table->string('ad', 100)->comment('一句广告语');
            $table->decimal('price')->comment('价格');
            $table->decimal('original_price')->comment('原价格');
            $table->string('icon')->comment('图片');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
