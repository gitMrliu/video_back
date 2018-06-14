<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id')->comment('评论');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->integer('comment_id')->default(0)->comment('评论id');
            $table->integer('comment_type')->default(0)->comment('评论类型：电影或电视剧');
            $table->integer('repay_id')->default(0)->comment('回应id');
            $table->decimal('score',3,1)->comment('用户评分');
            $table->text('content')->comment('评论内容');
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
        Schema::dropIfExists('comment');
    }
}
