<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novel_chapter', function (Blueprint $table) {
            $table->increments('id')->coment('小说章节');
            $table->integer('novel_id')->comment('小说id');
            $table->integer('chapter_num')->comment('章节数');
            $table->string('charpter_title')->comment('章节标题');
            $table->text('novel_content')->comment('小说章节内容');
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
        Schema::dropIfExists('novel_chapter');
    }
}
