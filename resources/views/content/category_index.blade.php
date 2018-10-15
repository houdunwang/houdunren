@extends('content.layouts.admin')
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('content.category.index')}}" class="nav-link mr-3 active">
                            栏目列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.category.create')}}" class="nav-link mr-3">
                            添加栏目
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-sm">
                        <thead>
                        <tr>
                            <th scope="col" width="80">编号</th>
                            <th scope="col">栏目名称</th>
                            <th scope="col">模型名称</th>
                            <th>封面栏目</th>
                            <th scope="col">创建时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category['id']}}</td>
                                <td>
                                    {{$category['_title']}}
                                </td>
                                <td>{{$category->model->title}}</td>
                                <td>
                                    @if($category['is_homepage'])
                                        <span class="fe fe-check-circle text-info"></span>
                                    @else
                                        <span class="fe fe-x-circle text-secondary"></span>
                                    @endif
                                </td>
                                <td>{{$category['created_at']->format('Y/m/d')}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a class="btn btn-light" href="{{route('content.category.edit',$category)}}">编辑栏目</a>
                                        <button type="button" class="btn btn-danger" onclick="del(this)">删除栏目</button>
                                        <form action="{{route('content.category.destroy',$category)}}" method="post">
                                            @method('DELETE') @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(button) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('将同时删除栏目下的所有文章<br/>你确定执行删除吗?', function () {
                    $(button).next('form').submit();
                })
            })
        }
    </script>
@endpush
