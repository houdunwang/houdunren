<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path', 2000)->comment('压缩包文件');
            $table->unsignedInteger('shop_module_id')->comment('模块编号');
            $table->foreign('shop_module_id')->references('id')->on('shop_modules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_packages');
    }
}
