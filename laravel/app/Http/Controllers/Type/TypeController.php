<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/13 0013
 * Time: 下午 2:23
 */

namespace App\Http\Controllers\Type;

use App\Http\Controllers\Controller;
use App\Http\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $name = $request->input('name');

        $data = Type::where('name','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);

        return view('type.index',['list'=>$data,'name'=>$name]);
    }

    public function add() {
        return view('type.add');
    }

    public function addSave() {
        unset($_POST['_token']);
        Type::create($_POST);
        return redirect('Type/index');
    }

    public function edit() {
        $data = Type::find($_GET['id']);
        return view('type.edit',['list'=>$data]);
    }
    public function editsave()
    {
        unset($_POST['_token']);
        $data = Type::find($_POST['id']);
        $data->update($_POST);
        return redirect('Type/index');
    }

    public function delete()
    {
        $data = Type::find($_GET['id']);
        $data->delete($_GET['id']);
        return redirect('Type/index');
    }
}