@extends('edu.document.layouts.master',['document' => $chapter->document])
@section('content')
    <div class="container">
        <form action="{{route('edu.chapter.update',$chapter)}}" method="post">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-header">
                    修改章节
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">章节名称</label>
                        <input type="text" name="title" class="form-control" value="{{$chapter['title']}}" placeholder="请输入章节名称">
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-primary btn-sm">保存提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection
