@extends('layouts.admin')
@inject('SiteRepository','App\Repositories\SiteRepository')
@section('content')
    <ol class="breadcrumb small">
        <li class="breadcrumb-item active">
            <i class="fa fa-home"></i>
            <a href="{{route('site.site.index')}}">站点列表</a>
        </li>
        <li class="breadcrumb-item"><a href="#">站点权限</a></li>
    </ol>
    <div class="card">
        <div class="card-header">
            站点的应用列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light small">
                <tr>
                    <th scope="col">服务套餐</th>
                    <th scope="col">模块</th>
                    <th scope="col" class="w-50">模板</th>
                </tr>
                </thead>
                <tbody>
                @foreach($SiteRepository->packages($site) as $package)
                    <tr>
                        <td>{{$package['name']}}</td>
                        <td>
                            @foreach($package->module as $module)
                                <span class="badge badge-info">{{$module['name']}}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($package->template as $template)
                                <span class="badge badge-success">{{$template['name']}}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop