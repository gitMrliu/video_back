@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="search">
                                <form action="index" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                名字
                                            </td>
                                            <td>
                                                {{csrf_field()}}
                                                <input type="text" name="name" value="{{$name}}" class="text short">
                                            </td>
                                            <td>
                                                <input type="hidden" name="page" value="1">
                                                <button class="button">查找</button>
                                            </td>
                                            <td>
                                                <a href="add"><button class="button" type="button">添加</button></a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        <div class="list">
                                <table border="1" cellspacing="0">
                                    <tr>
                                        <th>编号</th>
                                        <th>小说名称</th>
                                        <th>评分</th>
                                        <th>图片地址</th>
                                        <th>下载地址</th>
                                        <th>作者</th>
                                        <th>状态</th>
                                        <th>类型</th>
                                        <th>内容简介</th>
                                        <th>添加时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>

                                    </tr>
                                    @foreach($model as $v)
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->title}}</td>
                                            <td>{{$v->score}}</td>
                                            <td><img src="{{$v->img_url}}" width="70"></td>
                                            <td>{{$v->download_url}}</td>
                                            <td>{{$v->author['author_name']}}</td>
                                            <td>{{$v->status_text}}</td>
                                            <td>{{$v->type['name']}}</td>
                                            <td>{{$v->desc}}</td>
                                            <td>{{$v->created_at}}</td>
                                            <td >{{$v->updated_at}}</td>
                                            <td><a href="delete?id={{$v->id}}"><button type="button" class="button">删除</button></a>
                                                <a href="edit?id={{$v->id}}"><button type="button" class="button">修改</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            {{$model->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
