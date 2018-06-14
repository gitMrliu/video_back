<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_collection', function (Blueprint $table) {
            $table->increments('id')->comment('电视剧剧集表');
            $table->integer('tv_id')->default(0)->comment('电视剧id');
            $table->integer('collection_index')->comment('电视剧集数');
            $table->string('collection_desc',255)->comment('剧情介绍简介');
            $table->string('download_url')->comment('下载地址');
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
        Schema::dropIfExists('tv_collection');
    }
}
