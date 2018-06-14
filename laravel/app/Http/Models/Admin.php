<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/6/10
 * Time: 19:53
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('PRC');
class Admin extends Model
{
    protected $table="admin";

    function log($data){
        if(empty($data['uname']) || empty($data['pwd'])){
            echo '用户名或密码不能为空';
            return false;
        }else{
            $user=DB::table('admin')->where(['uname'=>$data['uname']])->get()->toArray();

           if($user){
               if(md5($data['pwd'])==$user[0]->pwd){

                   return true;
               }else{
                   echo "密码错误";
                   return false;
               }
           }else{
               echo "用户名不存在";
               return false;
           }
        }
    }
}