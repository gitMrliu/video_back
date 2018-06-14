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
                                            <th>小说名称</th>
                                            <td><input type="text" name="title" value="{{$data->title}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>评分</th>
                                            <td><input type="text" name="score"  value="{{$data->score}}" class="text"></td>
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
                                            <th>作者</th>
                                            <td>
                                                <select name="author_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $authors as $v)
                                                        <option value="{{$v->id}}" {{$data->author_id == $v->id ? 'selected':""}}>{{$v->author_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>状态</th>
                                            <td><input type="radio" name="status"  value="1" {{$data->status == 1 ? 'checked':""}}>连载
                                                <input type="radio" name="status"  value="2" {{$data->status == 2 ? 'checked':""}}>完结
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>类型</th>
                                            <td>
                                                <select name="type_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $type as $v)
                                                        <option value="{{$v->id}}" {{$data->type_id == $v->id ? 'selected':""}} >{{$v->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>内容简介</th>
                                            <td><input type="text" name="desc" value="{{$data->desc}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th><input type="hidden" name="id" value="{{$data->id}}"></th>
                                            <td>
                                                <button class="submit">提交</button>
                                                <a href="{{url('/novel/index')}}"><button type="button" class="cannel">返回</button></a>
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
