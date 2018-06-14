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
                                <table border="1">
                                    <tr>
                                        <th>编号</th>
                                        <th>用户</th>
                                        <th>评论用户</th>
                                        <th>评论类型</th>
                                        <th>回应用户</th>
                                        <th>用户评分</th>
                                        <th>评论内容</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>

                                    @foreach($model as $v)
                                    <tr>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->user_id}}</td>
                                        <td>{{$v->comment_id}}</td>
                                        <td>{{$v->comment_type}}</td>
                                        <td>{{$v->repay_id}}</td>
                                        <td>{{$v->score}}</td>
                                        <td>{{$v->content}}</td>
                                        <td>{{$v->created_at}}</td>
                                        <td>{{$v->updated_at}}</td>
                                        <td>
                                            <a href="delete?id={{$v->id}}"><button type="button" class="button">删除</button></a>
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
