<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('组名称');
            $table->unsignedSmallInteger('site_num')->comment('可创建的站点数量');
            $table->unsignedTinyInteger('system')->nullable()->comment('系统用户组');
            $table->timestamps();
        });
        DB::table('groups')->insert([
            'name' => '体验组',
            'site_num' => 3,
            'system' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
