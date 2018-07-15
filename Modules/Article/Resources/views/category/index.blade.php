@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'栏目管理'])
        @slot('nav')
            <li class="nav-item"><a href="#home" class="nav-link active">栏目管理</a></li>
            <li class="nav-item"><a href="/article/category/create" class="nav-link">添加栏目</a></li>
        @endslot
        @slot('body')
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width:10%;">编号</th>
                        <th>栏目名称</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category['id']}}</td>
                            <td>{!! $category['_name'] !!}</td>
                            <td>{{$category['created_at']}}</td>
                            <td>{{$category['updated_at']}}</td>
                            <td class="text-right">
                                <div class="btn-group btn-space">
                                    <a href="/article/category/{{$category['id']}}/edit" class="btn btn-secondary">编辑</a>
                                    <button type="button" class="btn btn-secondary" onclick="delCategory({{$category['id']}},this)">
                                        删除
                                    </button>
                                    <form action="/article/category/{{$category['id']}}" hidden method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function delCategory(id, bt) {
            if (confirm('确定删除栏目吗?')) {
                $(bt).next('form').trigger('submit');
            }
        }
    </script>
@endsection
