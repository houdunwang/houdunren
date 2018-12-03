@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container">
        <form action="{{route('edu.topic.update',$topic)}}" method="post" class="mt-5">
            @csrf @method('PUT')
            <div class="justify-content-center ">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="请输入标题"
                                   value="{{$topic['title']}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control text-secondary" name="category_id">
                                @foreach(\App\Models\EduCategory::get() as $cat)
                                    <option value="{{$cat['id']}}"
                                    {{active_class($cat['id']==$topic['category_id'],'selected')}}>{{$cat['title']}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($topic->category->description)
                        <div class="alert alert-light text-muted" role="alert">
                            {!! $topic->category->description !!}
                        </div>
                        @endif
                        <div id="editorMd">
                            <textarea style="display:none;" name="content">{{$topic['content']}}</textarea>
                        </div>
                        <span class="badge badge-pill badge-light text-secondary">支持粘贴与拖放上传图片</span>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <button class="btn btn-primary btn-xs">保存发布</button>
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
