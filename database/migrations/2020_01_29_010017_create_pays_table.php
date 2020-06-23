<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('site_id')->constrained();
            $table->foreignId('module_id')->constrained();
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
