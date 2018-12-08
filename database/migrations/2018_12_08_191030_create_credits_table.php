<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('标识');
            $table->string('title')->nullable()->comment('中文名称');
            $table->tinyInteger('status')->default(1)->comment('开启');
            $table->string('unit')->default('个')->comment('单位');
            $table->tinyInteger('system')->default(0);
            $table->timestamps();
        });
        DB::table('credits')->insert([
            ['name' => 'credit1', 'title' => '积分', 'unit' => '个', 'system' => 1],
            ['name' => 'credit2', 'title' => '余额', 'unit' => '元', 'system' => 1],
            ['name' => 'credit3', 'title' => '金币', 'unit' => '个', 'system' => 0],
            ['name' => 'credit4', 'title' => '威望', 'unit' => '个', 'system' => 0],
            ['name' => 'credit5', 'title' => '经验', 'unit' => '个', 'system' => 0],
            ['name' => 'credit6', 'title' => '声望', 'unit' => '个', 'system' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
