@extends('layouts.system')
@section('content')
    <div class="alert alert-danger" role="alert">
        本次共需要更新 {{$update['download_total']}} 个文件，请不要关闭窗口，如果长时间无响应可以刷新当前页面。
    </div>
    <div class="card">
        <div class="card-header">
            下载更新文件
        </div>
        <div class="card-body text-success" id="lists" style="max-height: 300px; overflow-y: auto"></div>
    </div>
@endsection
@push('js')
    <script>
        function download() {
            require(['hdjs', 'axios','jquery'], function (hdjs, axios,$) {
                axios.post('{{route('cloud.update.download')}}').then((response) => {
                    if (response.data.message == 'file') {
                        $("#lists").prepend('<li>'+response.data.file + "更新完成</li>");
                        setTimeout(function(){download()},1000);
                    } else {
                        //下载完成请求移动
                        location.href="{{route('cloud.update.move')}}";
                    }
                }).catch(function (error) {
                    hdjs.info(error.response.data.message);
                })
            })
        }
        download();
    </script>
@endpush