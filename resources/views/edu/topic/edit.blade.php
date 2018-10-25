@extends('edu.layouts.master')
@section('content')
    <div class="container">
        <form action="{{route('edu.topic.update',$topic)}}" method="post" class="mt-5">
            @csrf @method('PUT')
            <input type="hidden" name="category_id" value="{{$topic->category->id}}" required>
            <div class="justify-content-center ">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="请输入标题"
                                   value="{{$topic['title']}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                @foreach(\App\Models\EduCategory::get() as $category)
                                    <option value="{{$category['id']}}"
                                    {{active_class($category['id']==$topic['category_id'],'selected')}}>{{$category['title']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="alert alert-light text-muted" role="alert">
                            {!! $topic->category->description !!}
                            <hr>
                            支持粘贴与拖放上传图片
                        </div>
                        <div id="editorMd">
                            <textarea style="display:none;" name="content">{{$topic['content']}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <button class="btn btn-primary">保存发布</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.editormd("editorMd", {
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
