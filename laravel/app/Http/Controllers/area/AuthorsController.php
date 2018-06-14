<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 2:13
 */

namespace App\Http\Controllers\Area;


use App\Http\Controllers\Controller;
use App\Http\Models\Authors;
use Illuminate\Http\Request;


class AuthorsController extends Controller
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

        $model = Authors::where('author_name','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);

        return view('authors/index',['model'=>$model,'name'=>$name]);
    }

    public function add(){
        return view('authors/add');
    }

    public function addSave(){
        unset($_POST['_token']);
        Authors::create($_POST);
        return redirect('authors/index');
    }

    public function delete(){
        $data = Authors::find($_GET['id']);
        if($data){
            $data->delete($_GET['id']);
            return redirect('authors/index');
        }else{
            return 'error';
        }
    }
    public function edit(){
        $data = Authors::find($_GET['id']);
        if($data){
            return view('authors/edit',['data'=>$data]);
        }else{
            return 'error';
        }
    }

    public function editSave(){
        unset($_POST['_token']);
        $model = new Authors();
        $model->where(['id'=>$_POST['id']])->update($_POST);
        return redirect('authors/index');
    }
}