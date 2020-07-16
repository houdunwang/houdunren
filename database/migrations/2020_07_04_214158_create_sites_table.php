<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->char('title', 30)->unique()->comment('站点名称');
            $table->char('domain', 50)->unique()->comment('域名');
            $table->json('config')->comment('站点配置');
            $table->foreignId('module_id')->nullable()->constrained()->onDelete("SET NULL")->comment('默认模块');
            $table->foreignId('user_id')->constrained()->onDelete("cascade")->comment('站长');
            $table->timestamps();

            $table->string('name')->nullable()->unique()->comment('站点名称');
            $table->string('keyword', 100)->nullable()->comment('关键字');
            $table->string('description', 100)->nullable()->comment('站点描述');
            $table->string('logo')->nullable()->comment('LOGO');
            $table->string('icp', 100)->nullable()->comment('ICP');
            $table->string('tel', 30)->nullable()->comment('电话');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('counter')->nullable()->comment('统计代码');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
