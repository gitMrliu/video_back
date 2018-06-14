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
                                <form action="editSave" method="post">
                                    {{csrf_field()}}
                                    <table>
                                        <tr>
                                            <th>小说id</th>
                                            <td>
                                                <select name="novel_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $novel as $v)
                                                        <option value="{{$v->id}}" {{$data->novel_id == $v->id ? 'selected':""}}>{{$v->title}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>章节数</th>
                                            <td><input type="text" name="chapter_num" value="{{$data->chapter_num}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>章节标题</th>
                                            <td><input type="text" name="charpter_title" value="{{$data->charpter_title}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>小说内容</th>
                                            <td><input type="text" name="novel_content" value="{{$data->novel_content}}" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th><input type="hidden" name="id" value="{{$data->id}}"></th>
                                            <td>
                                                <button class="submit">提交</button>
                                                <a href="{{url('/chapter/index')}}"><button type="button" class="cannel">返回</button></a>
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
