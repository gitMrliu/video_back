@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="info">
                                <form action="editSave" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <table>
                                        <tr>
                                            <th>电影名称</th>
                                            <td><input type="text" name="title" value="{{$data->title}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>图片地址</th>
                                            <td><input type="file" name="img_url" value="{{$data->img_url}}" ></td>
                                        </tr>
                                        <tr>
                                            <th>下载地址</th>
                                            <td><input type="text" name="download_url" value="{{$data->download_url}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>用户评分</th>
                                            <td><input type="text" name="score" value="{{$data->score}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>语言</th>
                                            <td><input type="text" name="lanaguage_type" value="{{$data->lanaguage_type}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>地区</th>
                                            <td>
                                                <select name="area_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $area as $v)
                                                        <option value="{{$v->id}}" {{$data->area_id == $v->id ? 'selected':""}}>{{$v->area_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>类型</th>
                                            <td>
                                                <select name="type_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $type as $v)
                                                        <option value="{{$v->id}}" {{$data->type_id == $v->id ? 'selected':""}}>{{$v->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>年代</th>
                                            <td>
                                                <select name="year_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $home as $v)
                                                        <option value="{{$v->id}}" {{$data->year_id == $v->id ? 'selected':""}}>{{$v->years}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>导演</th>
                                            <td>
                                                <select name="director_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $director as $v)
                                                        <option value="{{$v->id}}" {{$data->director_id == $v->id ? 'selected':""}}>{{$v->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>演员</th>
                                            <td>
                                                <select name="actor_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $actor as $v)
                                                        <option value="{{$v->id}}"  {{$data->actor_id == $v->id ? 'selected':""}}>{{$v->actor_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>电影简介</th>
                                            <td><input type="text" name="desc" value="{{$data->desc}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th><input type="hidden" name="id" value="{{$data->id}}"></th>
                                            <td>
                                                <button class="submit">提交</button>
                                                <a href="{{url('/film/index')}}"><button type="button" class="cannel">返回</button></a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
