<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 上午 10:45
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
date_default_timezone_set('PRC');
class Actor extends Model
{
    protected $table='actor';
//    protected $timestamps = 'true';
//$fillable 批量添加
protected $fillable = ['actor_name'];


}