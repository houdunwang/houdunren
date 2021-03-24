<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleConfigsTable extends Migration
{
    public function up()
    {
        Schema::create('module_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->json('config')->comment('配置项');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('module_configs');
    }
}
