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
            $table->string('order_sn')->unique()->comment('模块定单号');
            $table->string('module')->comment('模块标识');
            $table->unsignedInteger('user_id')->index();
            $table->tinyInteger('status')->default(0)->comment('定单状态');
            $table->string('alipay_trade_no')->nullable()->comment('支付宝交易号');
            $table->decimal('fee')->comment('价格');
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
