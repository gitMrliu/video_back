<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 2:58
 */

namespace App\Http\Controllers\area;


use App\Http\Controllers\Controller;
use App\Http\Models\Actor;
use App\Http\Models\Area;
use App\Http\Models\Director;
use App\Http\Models\Film;
use App\Http\Models\HomeModel;
use App\Http\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
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
        $model = Film::where('title','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);
        return view('film/index',['model'=>$model,'name'=>$name]);
    }
    public function add(){
        $actor = Actor::get();
        $director = Director::get();
        $home = HomeModel::get();
        $type = Type::get();
        $area = Area::get();
        return view('film/add',[
            'actor'=>$actor,
            'director'=>$director,
            'home'=>$home,
            'type'=>$type,
            'area'=>$area
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
        Film::create($data);
        return redirect('film/index');
    }
    public function delete(){
        $data=Film::find($_GET['id']);
        if($data){
            $data->delete($_GET['id']);
            return redirect('film/index');
        }else{
            return 'error';
        }
    }
    public function edit(){
        $actor = Actor::get();
        $director = Director::get();
        $home = HomeModel::get();
        $type = Type::get();
        $area = Area::get();
        $data=Film::find($_GET['id']);
        if($data){
            return view('film/edit',[
                'data'=>$data,
                'actor'=>$actor,
                'director'=>$director,
                'home'=>$home,
                'type'=>$type,
                'area'=>$area
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
        $dat = Film::find($_POST['id']);
        $dat->update($data);
        return redirect('film/index');
    }
}