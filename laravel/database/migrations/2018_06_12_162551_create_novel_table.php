<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novel', function (Blueprint $table) {
            $table->increments('id')->comment('小说表');
            $table->string('title')->comment('小说名称');
            $table->decimal('score',2,1)->comment('评分');
            $table->string('img_url')->default('')->comment('图片地址');
            $table->string('download_url')->default('')->comment('下载地址');
            $table->integer('author_id')->comment('作者id');
            $table->integer('status')->comment('状态');
            $table->integer('type_id')->comment('类型');
            $table->string('desc')->comment('内容简介');
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
        Schema::dropIfExists('novel');
    }
}
