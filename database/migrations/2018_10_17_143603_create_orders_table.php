<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_sn')->index()->comment('订单号');
            $table->unsignedTinyInteger('is_pay')->nullable()->comment('订单状态1成功0未支付');
            $table->string('alipay_trade_no')->nullable()->comment('支付宝交易号');
            $table->string('goods_name')->comment('商品名称');
            $table->decimal('fee')->default('0')->comment('价格');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
