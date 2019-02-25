@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['桌面会员中心菜单设置'=>'#']]) @endcomponent
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link active" href="#">菜单列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{module_link('module.menu.create',request('type'))}}">
                添加菜单
            </a>
        </li>
    </ul>
    <div class="card">
        <div class="card-header">
            {{$type=='web'?'桌面会员中心菜单':'手机会员中心菜单'}}列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#编号</th>
                    <th>图标</th>
                    <th>标题</th>
                    <th>链接</th>
                    <th>状态</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu['id']}}</td>
                        <td>
                            <i class="{{$menu['icon']}}"></i>
                        </td>
                        <td>
                            {{$menu['title']}}
                        </td>
                        <td><input type="text" class="form-control" value="{{$menu['url']}}"></td>
                        <td>
                            @if ($menu['status'])
                                <i class="fa fa-check-circle-o text-success"></i>
                            @else
                                <i class="fa fa-times-circle-o"></i>
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success"
                                   href="{{module_link('module.menu.edit',[request('type'),$menu])}}">
                                    编辑菜单
                                </a>
                                <button type="button" class="btn btn-outline-danger" onclick="destroy(this)">
                                    删除菜单
                                </button>
                                <form action="{{module_link('module.menu.destroy',[$type,$menu])}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除菜单吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush