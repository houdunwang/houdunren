@extends('edu.document.layouts.master',['document' => $chapter->document])
@section('content')
    <div class="container">
        <form action="{{route('edu.section.store',['chapter_id' => $chapter['id']])}}" method="post">
            @csrf
            <input type="hidden" name="chapter_id" value="{{$chapter['id']}}">
            <div class="card">
                <div class="card-header">
                    新增节
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">节名称</label>
                        <input type="text" name="title" class="form-control" placeholder="请输入节名称">
                    </div>
                    <div class="form-group">
                        <label for="">内容</label>
                        <div id="editormd">
                            <textarea style="display:none;" name="content"></textarea>
                        </div>
                        <script>
                            require(['hdjs'], function (hdjs) {
                                hdjs.editormd("editormd", {
                                    width: '100%',
                                    height: 300,
                                    toolbarIcons : function() {
                                        return [
                                            "bold", "del", "italic", "quote","|",
                                            "list-ul", "list-ol", "hr", "|",
                                            "link", "hdimage", "code-block", "|",
                                            "watch", "preview", "fullscreen"
                                        ]
                                    },
                                    //editor.md库位置
                                    path: "{{asset('org/hdjs')}}/package/editor.md/lib/"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-primary btn-sm">保存提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection
