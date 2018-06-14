<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Models\HomeModel;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $name = $request->input('name');
        $data = HomeModel::where('years','like','%'.$name.'%')->orderBy('id','desc')->paginate(5);
        return view('Home.index',['list'=>$data,'name'=>$name]);
    }

    public function add()
    {
        return view('Home.add');
    }

    public function addsave(){

        unset($_POST['_token']);
        HomeModel::create($_POST);
        return redirect('Home/index');
    }

    public function edit()
    {
        $data = HomeModel::find($_GET['id']);

        return view('Home.edit',['list'=>$data]);
    }

    public function editsave()
    {

        unset($_POST['_token']);
        $data = HomeModel::find($_POST['id']);
        $data->update($_POST);
        return redirect('Home/index');
    }

    public function delete()
    {
        $data = HomeModel::find($_GET['id']);
        $data->delete($_GET['id']);
        return redirect('Home/index');
    }
}
