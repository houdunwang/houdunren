@extends('layouts.system')
@section('content')
    @if($update['total'])
        <div class="alert alert-success" role="alert">
            本次共需要更新 {{$update['total']}} 个文件，请不要关闭窗口
        </div>
        <div class="card">
            <div class="card-header">
                下载更新文件
            </div>
            <div class="card-body" id="lists" style="max-height: 300px; overflow-y: auto">
                @foreach($update['logs'] as $log)
                    <li>{{$log}} </li>
                @endforeach
            </div>
        </div>
        <a href="{{route('cloud.update.download')}}" class="btn btn-danger mt-3">开始更新</a>
    @else
        <div class="card">
            <div class="card-header">
                温馨提示
            </div>
            <div class="card-body">
                恭喜您！使用的是最新版本
            </div>
        </div>
    @endif
@endsection
@push('js')
    <script>
        function download() {
            require(['hdjs', 'axios'], function (hdjs, axios) {
                axios.get('{{route('cloud.update.download')}}').then(function (response) {
                    if (response.data.message == 'success') {
                        $("#lists").appendTo(response.data.file + "更新完成");
                    } else {
                        alert(response.data.message);
                    }
                }).catch(function (error) {
                    alert(error);
                })
            })
        }

        download();
    </script>
@endpush