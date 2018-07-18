@extends('admin::layouts.master')
@section('content')
        <div class="row">
            <div class="col-sm-12">
                <div role="alert" class="alert alert-primary alert-simple alert-dismissible">
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button>
                    <div class="icon"> <span class="mdi mdi-info-outline"></span></div>
                    <div class="message">
                        1. 默认模块指可以通过域名直接访问的模块 <br>
                        2. 模块存在 HomeController控制器并存在 index 方法可设为默认模块 <br>
                        3. 如果模块在列表中不存在，请点击更新模块缓存
                    </div>
                </div>
            </div>
        </div>
    <div class="card" id="app">
        <div class="card-header">模块管理</div>
        <div class="tab-container">
            <ul role="tablist" class="nav nav-tabs">
                <li class="nav-item"><a href="/admin/module" pjax class="nav-link active">模块列表</a></li>
                <li class="nav-item"><a href="/admin/module_update_cache" pjax class="nav-link">更新缓存</a></li>
            </ul>
            <div class="card card-contrast card-border-color-success">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10%;">编号</th>
                            <th>模块名称</th>
                            <th>模块标识</th>
                            <th>默认模块</th>
                            <th>前台可访问</th>
                            <th>更新时间</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{!! $d['id'] !!}</td>
                                <td>{!! $d['title'] !!}</td>
                                <td>{!! $d['name'] !!}</td>
                                <td>{!! $d['is_default']?'是':'否' !!}</td>
                                <td>{!! $d['front_access']?'是':'否' !!}</td>
                                <td>{!! $d['updated_at'] !!}</td>
                                <td class="text-right">
                                    @if($d['front_access'])
                                        <a href="/admin/module_set_default/{{$d['id']}}" class="btn {{$d['is_default']?'btn-success':'btn-secondary'}}">设为默认</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
    </div>
@endsection
@section('scripts')
@endsection
