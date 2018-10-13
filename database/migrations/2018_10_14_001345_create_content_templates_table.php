<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('preview')->nullable();
            $table->string('mode');
            $table->text('package');
            $table->unsignedTinyInteger('using')->default(0)->comment('使用中');
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
        Schema::dropIfExists('content_templates');
    }
}
