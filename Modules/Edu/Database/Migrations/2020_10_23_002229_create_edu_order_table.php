<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//交易定单
class CreateEduOrderTable extends Migration
{

    public function up()
    {
        Schema::create('edu_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('lesson_id')->nullable();
            $table->decimal('price')->comment('价格');
            $table->string('subject', 100)->comment('商品名称');
            $table->string('sn', 100)->index()->comment('定单号');
            $table->string('trade_no', 100)->index()->comment('支付定单号');
            $table->char('type', 20)->comment('类型:subscribe:订阅,lesson:课程');
            $table->tinyInteger('month')->nullable()->comment('订阅月数');
            $table->boolean('status')->default(false)->comment('支付状态');
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
        Schema::dropIfExists('edu_order');
    }
}
