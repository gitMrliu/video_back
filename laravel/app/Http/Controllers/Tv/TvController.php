<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 4:04
 */

namespace App\Http\Controllers\Tv;


use App\Http\Controllers\Controller;
use App\Http\Models\Actor;
use App\Http\Models\Area;
use App\Http\Models\Director;
use App\Http\Models\HomeModel;
use App\Http\Models\Tv;
use App\Http\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TvController extends Controller
{
    /**
     * @desc 验证是否登录
     * TvController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $name = $request->input('name');

        $data = Tv::where('tv_name','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);
        return view('Tv.index',['list'=>$data,'name'=>$name]);
    }

    public function add(){
        $actor = Actor::get();
        $director = Director::get();
        $home = HomeModel::get();
        $type = Type::get();
        $area = Area::get();
        return view('Tv.add',[
            'actor'=>$actor,
            'director'=>$director,
            'home'=>$home,
            'type'=>$type,
            'area'=>$area
        ]);
    }

    public function addSave(Request $request) {

        $file = $request->file('img_url');
        $data = $request->input();
        if ($file) {
            $originalName = $file->getClientOriginalName();
            $realPath = $file->getRealPath();
            Storage::disk('uploads')->put($originalName,file_get_contents($realPath));
            $data['img_url'] ='/uploads/'.$originalName;
            unset($data['_token']);
        } else {
            unset($data['_token']);
        }
        Tv::create($data);
        return redirect('Tv/index');
    }

    public function edit() {
        $actor = Actor::get();
        $director = Director::get();
        $home = HomeModel::get();
        $type = Type::get();
        $area = Area::get();
        $data = Tv::find($_GET['id']);
        return view('Tv.edit',[
            'list'=>$data,
            'actor'=>$actor,
            'director'=>$director,
            'home'=>$home,
            'type'=>$type,
            'area'=>$area
        ]);
    }

    public function editSave(Request $request) {
        $file = $request->file('img_url');
        $data = $request->input();
        if ($file) {
            $originalName = $file->getClientOriginalName();
            $realPath = $file->getRealPath();
            Storage::disk('uploads')->put($originalName,file_get_contents($realPath));
            $data['img_url'] ='/uploads/'.$originalName;
        } else {
            unset($_POST['img_url']);
        }
        unset($data['_token']);
        $dat = Tv::find($data['id']);
        $dat->update($data);
        return redirect('Tv/index');
    }

    public function delete() {
        $data = Tv::find($_GET['id']);
        $data->delete($_GET['id']);
        return redirect('Tv/index');
    }

}