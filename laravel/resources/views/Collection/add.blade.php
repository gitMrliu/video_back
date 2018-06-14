@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">电视剧表</div>

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
                                            <th>电视剧</th>
                                            <td>
                                                <select name="tv_id" class="text">
                                                    <option value="">请选择</option>
                                                    @foreach( $tv as $v)
                                                        <option value="{{$v->id}}">{{$v->tv_name}}</option>
                                                        @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>电视剧集数</th>
                                            <td><input type="text" name="collection_index" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>剧情介绍简介</th>
                                            <td><input type="text" name="collection_desc" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th>下载地址</th>
                                            <td><input type="text" name="download_url" class="text"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <button class="submit">提交</button>
                                                <a href="{{url('/Collection/index')}}"><button type="button" class="cannel">返回</button></a>
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
