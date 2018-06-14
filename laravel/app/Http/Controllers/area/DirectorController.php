<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 4:10
 */

namespace App\Http\Controllers\Area;


use App\Http\Controllers\Controller;
use App\Http\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $name = $request->input('name');

        $model = Director::where('name','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);

        return view('director/index',['model'=>$model,'name'=>$name]);
    }
    public function add(){
        return view('director/add');
    }
    public function addSave(){
        unset($_POST['_token']);
        Director::create($_POST);
        return redirect('director/index');
    }
    public function delete(){
        $data = Director::find($_GET['id']);
        if($data){
            $data->delete($_GET['id']);
            return redirect('director/index');
        }else{
            return 'error';
        }


    }
    public function edit(){
        $data = Director::find($_GET['id']);
        if($data){
            return view('director/edit',['data'=>$data]);
        }else{
            return 'error';
        }
    }
    public function editSave(){
        unset($_POST['_token']);
        $model = new Director();
        $model->where(['id'=>$_POST['id']])->update($_POST);
        return redirect('director/index');
    }

}