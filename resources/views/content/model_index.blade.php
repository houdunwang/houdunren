@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('content.model.index')}}" class="nav-link mr-3 active">
                            模型列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.model.create')}}" class="nav-link mr-3">
                            添加模型
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
                            <th scope="col">模型描述</th>
                            <th>系统模型</th>
                            <th scope="col">创建时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model['id']}}</td>
                                <td>{{$model['title']}}</td>
                                <td class="pl-5">
                                    @if($model['is_system'])
                                        <i class="fa fa-check-square-o text-primary" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times-circle-o text-secondary" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>{{$model['created_at']->format('Y-m-d')}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a class="btn btn-light" href="{{route('content.model.edit',$model)}}">编辑模型</a>
                                        <button type="button" class="btn btn-danger" onclick="del(this)">删除模型</button>
                                        <form action="{{route('content.model.destroy',$model)}}" method="post">
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
                hdjs.confirm('删除模型将删除模型的栏目与所有文章，你确定删除吗?', function () {
                    $(button).next('form').submit();
                })
            })
        }
    </script>
@endpush
