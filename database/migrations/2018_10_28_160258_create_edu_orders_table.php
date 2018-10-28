<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shop_id')->nullable()->comment('订阅编号');
            $table->unsignedInteger('lesson_id')->nullable()->comment('课程编号:与订阅编号二选一');
            $table->unsignedInteger('user_id')->index();
            $table->string('order_sn')->comment('网站订单号');
            $table->tinyInteger('status')->default(0)->comment('支付状态');
            $table->string('alipay_trade_no')->nullable()->comment('支付宝交易号');
            $table->decimal('fee')->comment('价格');
            $table->char('type', 10)->comment('subscriber:订阅 lesson:课程');
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
        Schema::dropIfExists('edu_orders');
    }
}
