<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->increments('id')->comment('电影表');
            $table->string('title')->default('')->comment('电影名');
            $table->string('img_url')->default('')->comment('图片地址');
            $table->string('download_url')->default('')->comment('下载地址');
            $table->decimal('score', 3,1)->comment('用户评分');
            $table->string('lanaguage_type')->comment('语言');
            $table->integer('area_id')->comment('地区');
            $table->integer('type_id')->comment('类型');
            $table->integer('year_id')->comment('年代');
            $table->integer('director_id')->comment('导演');
            $table->string('actor_id')->comment('演员');
            $table->string('desc',255)->comment('电影简介');
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
        Schema::dropIfExists('film');
    }
}
