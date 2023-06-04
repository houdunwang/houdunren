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
            $table->string('text_color')->comment('文字颜色')->default('text-gray-700');
            $table->string('bg_color')->comment('文字颜色')->default('bg-gray-50');
            $table->string('ad', 100)->comment('一句广告语');
            $table->decimal('price')->comment('价格');
            $table->unsignedSmallInteger('months')->comment('会员月数');
            $table->decimal('original_price')->comment('原价格');
            $table->string('icon')->comment('图片');
            $table->boolean('state')->default(true)->comment('开关状态');
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
