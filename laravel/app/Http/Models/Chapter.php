<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 5:20
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
date_default_timezone_set('PRC');
class Chapter extends Model
{
    /**
     * @var string
     * 指定表
     */
    protected $table = 'novel_chapter';

    /**
     * @var array
     * 批量添加
     */
    protected $fillable = [
      'novel_id', 
      'chapter_num',
      'charpter_title',
      'novel_content',
      'created_at',
      'updated_at'
    ];

    /**
     * @return mixed
     * 小说表处理
     */
    public function getNovelAttribute() {
        return Novel::find($this->novel_id);
    }
}