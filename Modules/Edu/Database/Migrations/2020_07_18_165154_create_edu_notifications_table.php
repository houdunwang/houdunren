<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('edu_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('site_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('type', 30);
            $table->string('title');
            $table->string('link');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('edu_notifications');
    }
}
