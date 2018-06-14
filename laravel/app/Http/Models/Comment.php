<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 8:38
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
date_default_timezone_set('PRC');
class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
        'user_id','comment_id','comment_type',
        'repay_id','score','content'
    ];
}