@extends('layouts.system')
@section('content')
    @include('system.update._tab')
    <div class="card">
        <div class="card-header">
            更新完成
        </div>
        <div class="card-body">
            <i class="fa fa-info-circle"></i> 恭喜！系统成功更新完毕。</div>
    </div>
@endsection