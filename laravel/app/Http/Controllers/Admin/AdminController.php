<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/6/10
 * Time: 19:44
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Models\Admin;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function login(){
        $model=new Admin();
        if($model->log($_POST)){
          return Redirect::to('Ping/index');
        }else{
            echo "错误";
        }
    }

}