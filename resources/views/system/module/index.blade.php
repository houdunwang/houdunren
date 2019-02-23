@extends('layouts.admin')
@section('content')
    @include('system.module._tabs')
    <div class="card">
        <div class="card-header">已安装模块列表</div>
        <div class="card-body">
            @foreach($modules as $module)
                <div class="row">
                    <div class="col-xs-4 col-md-1 text-dark">
                        <img src="{{$module['package']['thumb']}}" class="img-thumbnail">
                    </div>
                    <div class="col-xs-4 col-md-5 text-dark">
                        <strong class="title text-dark d-block">
                            {{$module['title']}}
                        </strong>
                        <small class="text-secondary">
                            标识：{{$module['name']}}
                        </small>
                        <small class="badge badge-info">
                            {{$module['local']?'本地模块':'线上模块'}}
                        </small>
                    </div>
                    <div class="col-xs-4 col-md-6 text-right mt-3">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            @if ($module['local'])
                                <a class="btn btn-outline-success" href="{{route('system.module.edit',$module)}}">
                                    编辑模块
                                </a>
                                <a class="btn btn-outline-info" href="{{route('system.module.refresh',$module)}}" data-container="body" data-toggle="popover"
                                   data-placement="top" data-content="修改本地模块配置项后需要重新更新模块">更新模块配置</a>
                            @endif
                            <button type="button" class="btn btn-outline-danger" onclick="destroy(this)"
                                    data-container="body" data-toggle="popover" data-placement="top"
                                    data-content="删除模块将删除模块所有数据与文件">
                                卸载模块
                            </button>
                            <form action="{{route('system.module.destroy',$module)}}" method="post">
                                @csrf @method('DELETE')
                            </form>
                            @if ($module['local'])
                                <a class="btn btn-outline-secondary" href="" data-container="body" data-toggle="popover"
                                   data-placement="top" data-content="打包下载提到应用商店出售">打包下载</a>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除模块吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }

        require(['bootstrap'], function () {
            $(function () {
                $('[data-toggle="popover"]').popover({
                    trigger: 'hover'
                })
            });
        })
    </script>
@endpush