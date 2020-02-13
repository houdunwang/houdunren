<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * 支付
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedBigInteger('site_id')->nullable()->comment('站点编号');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedBigInteger('module_id')->nullable()->comment('模块编号');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->tinyInteger('status')->default(0)->comment('定单状态');
            $table->string('trade_no')->nullable()->comment('交易号');
            $table->string('sn')->comment('商户定单号');
            $table->decimal('price')->comment('售价');
            $table->string('subject')->comment('商品名称');
            $table->string('pay_type')->comment('支付方式/微信/支付宝');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pays');
    }
}