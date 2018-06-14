<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 5:20
 */

namespace App\Http\Controllers\Area;


use App\Http\Controllers\Controller;
use App\Http\Models\Chapter;
use App\Http\Models\Novel;
use Illuminate\Http\Request;

class ChapterController extends Controller
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

    public function index(Request $request){
        $name = $request->input('name');

        $model = Chapter::where('novel_id','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);

        return view('chapter/index',['model'=>$model,'name'=>$name]);
    }

    public function add(){
        $novel = Novel::get();
        return view('chapter/add',['novel'=>$novel]);
    }

    public function addSave(){
        unset($_POST['_token']);
        Chapter::create($_POST);
        return redirect('chapter/index');
    }

    public function delete(){
        $data = Chapter::find($_GET['id']);
        if($data){
            $data->delete($_GET['id']);
            return redirect('chapter/index');
        }else{
            return 'error';
        }
    }

    public function edit(){
        $novel = Novel::get();
        $data = Chapter::find($_GET['id']);
        if($data){
            return view('chapter/edit',[
                'data'=>$data,
                'novel'=>$novel
            ]);
        }else{
            return 'error';
        }
    }

    public function editSave(){
        unset($_POST['_token']);
        $model = new Chapter();
        $model->where(['id'=>$_POST['id']])->update($_POST);
        return redirect('chapter/index');
    }
}