

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">类型表</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="info">
                                <form action="addSave" method="post">
                                    {{csrf_field()}}
                                    <table>
                                        <tr>
                                            <th>类型</th>
                                            <td><input type="radio" name="type" value="1">电影
                                                <input type="radio" name="type" value="2">电视
                                                <input type="radio" name="type" value="3">小说
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>类型姓名</th>
                                            <td><input type="text" name="name" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <button class="submit">提交</button>
                                                <a href="{{url('/Type/index')}}"><button type="button" class="cannel">返回</button></a>
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
