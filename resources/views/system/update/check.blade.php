@extends('layouts.system')
@section('content')
    @include('system.update._tab')
    @if($update['total'])
        <div class="alert alert-success" role="alert">
            本次共需要更新 {{$update['total']}} 个文件，请不要关闭窗口
        </div>
        <div class="card">
            <div class="card-header">
                更新日志
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
                <i class="fa fa-info-circle"></i> 当前系统是最新版本。
            </div>
        </div>
    @endif
@endsection