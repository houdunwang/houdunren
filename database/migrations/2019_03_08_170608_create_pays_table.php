<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('site_id')->comment('站点编号');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedInteger('module_id')->nullable()->comment('用户组编号');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->tinyInteger('status')->default(0)->comment('定单状态');
            $table->string('alipay_trade_no')->nullable()->comment('支付宝交易号');
            $table->string('sn')->comment('商户定单号');
            $table->decimal('price')->comment('售价');
            $table->string('subject')->comment('商品名称');
            $table->unsignedInteger('pay_id')->index();
            $table->string('pay_type')->index();
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
        Schema::dropIfExists('pays');
    }
}
