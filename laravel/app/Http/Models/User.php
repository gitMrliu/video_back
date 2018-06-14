<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/6/10
 * Time: 19:22
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
date_default_timezone_set('PRC');
class User extends Model
{
    protected $table = 'film';
}