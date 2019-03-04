@extends('layouts.system')
@section('content')
    @include('update.system._tab')
    <div class="alert alert-danger" role="alert">
        请不要关闭窗口，如果长时间无响应可以刷新当前页面。
    </div>
    <div class="card">
        <div class="card-header">
            备份旧版本文件
        </div>
        <div class="card-body">
            <i class="fa fa-info-circle"></i> 正在备份旧版本文件！如果更新失败你可以从 backup/{{$update['build']}} 目录恢复旧文件
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs', 'axios', 'jquery'], function (hdjs, axios, $) {
            axios.post('{{route('update.system.move')}}').then((response) => {
                console.log(response.data);
                if (response.data.code) {
                    location.href = "{{route('update.system.finish')}}";
                }
            }).catch(function (error) {
                hdjs.info(error.response.data.message);
            })
        })
    </script>
@endpush