@extends('content.layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('content.config.update')}}" method="post" class="col-12">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-header">
                    配置设置
                </div>
                <div class="card-body small">
                    <div class="form-group">
                        <label>列表条数</label>
                        <input type="text" name="list_row" class="form-control"
                               value="{{old('list_row',module_config('content.list_row'))}}">
                        <small id="helpId" class="text-muted">后台列表页显示的条数</small>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">保存提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection