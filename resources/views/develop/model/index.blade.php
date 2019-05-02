@extends('layouts.system')
@section('content')
    @include('develop.model._tab')
    <table class="table table-striped table-bordered table-inverse">
        <thead class="thead-inverse">
        <tr>
            <th>描述</th>
            <th>模型</th>
            <th>数据表</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{$model['title']}}</td>
                <td>{{$model['model']}}</td>
                <td>{{$model['table']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection