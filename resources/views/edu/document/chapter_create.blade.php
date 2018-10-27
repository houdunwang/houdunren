@extends('edu.document.layouts.master')
@section('content')
    <form action="{{route('edu.chapter.store',['document_id'=>request()->query('document_id')])}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                新增章节
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">章节名称</label>
                    <input type="text" name="title" class="form-control" placeholder="请输入章节名称">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary btn-sm">保存提交</button>
            </div>
        </div>
    </form>
@endsection
