@extends('edu.layouts.master')
@section('content')
    <form action="{{route('edu.topic.store')}}" method="post">
        @csrf
        <input type="hidden" name="category_id" value="{{$category['id']}}" required>
        <div class="justify-content-center ">
            <div class="card">
                <div class="card-header text-center pt-5">
                    <h1 class="text-secondary text-muted">发布<strong>{{$category['title']}}</strong></h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="请输入标题" aria-describedby="helpId">
                    </div>
                    <div class="alert alert-light text-muted" role="alert">
                        {!! $category['description'] !!}
                        <hr>
                        支持粘贴与拖放上传图片
                    </div>
                    <div id="editormd">
                        <textarea style="display:none;" name="content"></textarea>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <button class="btn btn-primary">保存发布</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.editormd("editormd", {
                width: '100%',
                height: 300,

                toolbarIcons: function () {
                    return [
                        "bold", "del", "italic", "quote",
                        "list-ul", "list-ol", "hr",
                        "link", "hdimage", "code-block",
                        "watch", "preview", "fullscreen"
                    ]
                },
                //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                server: '',
                //editor.md库位置
                path: "{{asset('org/hdjs')}}/package/editor.md/lib/"
            });
        });
    </script>
@endpush
