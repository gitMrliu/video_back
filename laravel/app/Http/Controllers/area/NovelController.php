<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 4:26
 */

namespace App\Http\Controllers\area;


use App\Http\Controllers\Controller;
use App\Http\Models\Authors;
use App\Http\Models\Novel;
use App\Http\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NovelController extends Controller
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
        $model = Novel::where('title','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);
        return view('novel/index',['model'=>$model,'name'=>$name]);
    }
    public function add(){
        $authors = Authors::get();
        $type = Type::get();

        return view('novel/add',[
        'authors'=>$authors ,
            'type'=>$type
        ]);
    }

    public function addSave(Request $request){

        $file = $request->file('img_url');
        if ($file->isValid()) {
            $originalName = $file->getClientOriginalName();
            $realPath = $file->getRealPath();
            Storage::disk('uploads')->put($originalName,file_get_contents($realPath));
            $data = $request->input();
            $data['img_url'] ='/uploads/'.$originalName;
        }

        unset($data['_token']);
        Novel::create($data);
        return redirect('novel/index');
    }

    public function delete(){
        $data =Novel::find($_GET['id']);
        if($data){
            $data->delete(['id'=>$_GET['id']]);
            return redirect('novel/index');
        }else{
            return 'error';
        }
    }
    public function edit(){
        $authors = Authors::get();
        $type = Type::get();
        $data =Novel::find($_GET['id']);
        if($data){
            return view('novel/edit',[
                'data'=>$data,
                'authors'=>$authors ,
                'type'=>$type
            ]);
        }else{
            return 'error';
        }
    }
    public function editSave(Request $request){

        $file = $request->file('img_url');

        if ($file->isValid()) {
            $originalName = $file->getClientOriginalName();
            $realPath = $file->getRealPath();
            Storage::disk('uploads')->put($originalName,file_get_contents($realPath));
            $data = $request->input();
            $data['img_url'] ='/uploads/'.$originalName;
        } else {
            $data = $request->input();
            unset($_POST['img_url']);
        }

        unset($_POST['_token']);
        $dat = Novel::find($_POST['id']);
        $dat->update($data);
        return redirect('novel/index');
    }
}