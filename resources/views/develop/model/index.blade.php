@extends('layouts.system')
@section('content')
    @include('develop.model._tab')
    <table class="table table-striped table-bordered table-inverse">
        <thead class="thead-inverse">
        <tr>
            <th>模型</th>
            <th>模型</th>
            <th>数据表</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{$model['title']}}</td>
                <td>{{$model['model']}}</td>
                <td>{{$model['table']}}</td>
                <td>
                    <div class="btn-group btn-group-sm float-right">
                        <a href="" class="btn btn-outline-info">预览</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection