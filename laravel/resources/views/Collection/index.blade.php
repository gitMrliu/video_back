@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> </div>

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
                                <table border="1">
                                    <tr>
                                        <th>编号</th>
                                        <th>电视剧</th>
                                        <th>电视剧集数</th>
                                        <th>剧情介绍简介</th>
                                        <th>下载地址</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                    @foreach( $list as $v)
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->Tv['tv_name']}}</td>
                                            <td>{{$v->collection_index}}</td>
                                            <td>{{$v->collection_desc}}</td>
                                            <td>{{$v->download_url }}</td>
                                            <td>{{$v->created_at}}</td>
                                            <td>{{$v->updated_at}}</td>
                                            <td>
                                                <a href="edit?id={{$v->id}}"><button type="button" class="button">修改</button></a>
                                                <a href="delete?id={{$v->id}}"><button type="button" class="button">删除</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            {{$list->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
