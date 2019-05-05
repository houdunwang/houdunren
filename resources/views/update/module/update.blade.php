@extends('layouts.system')
@section('content')
    @include('system.module._tabs')
    <div class="card">
        <div class="card-header">
            下载模块
        </div>
        <div class="card-body text-center p-5">
            <strong class="text-secondary">
                <i class="fa fa-info-circle"></i> 正在下载 【{{$module['title']}}】 模块
            </strong>
            <div class="text-muted mt-3">
                下载时间受压缩包大小影响，你也可以在应用商店的会员中心手动下载压缩包。
            </div>
            <div class="mt-2" id="message">
                <div class="progress col-5 p-0 m-auto">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['axios', 'hdjs'], function (axios, hdjs) {
            axios.get('{{route('update.module.download',$module['name'])}}').then(function (response) {
                $("#message").html('<strong class="text-success">准备执行数据迁移...</strong>');
                axios.get('{{route('update.module.install',$module['name'])}}').then(function (response) {
                    $("#message").html('<strong class="text-success">安装完毕</strong>');
                    hdjs.message('模块安装成功', '', 'success', 10, {
                        events: {
                            'hidden.bs.modal': function () {
                                location.href = '{{route("system.module.index")}}';
                            }
                        }
                    });
                });
            }).catch(function (error) {
                hdjs.info(error.response.data.message);
            })
        })
    </script>
@endpush