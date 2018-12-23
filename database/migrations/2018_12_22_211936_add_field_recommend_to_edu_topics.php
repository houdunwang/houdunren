<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRecommendToEduTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edu_topics', function (Blueprint $table) {
            $table->unsignedTinyInteger('recommend')->comment('推荐');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edu_topics', function (Blueprint $table) {
            $table->dropColumn('recommend');
        });
    }
}
