<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 7:37
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
date_default_timezone_set('PRC');
class Area extends Model
{
    protected $table = 'area';
    protected $fillable = ['area_name'];
}