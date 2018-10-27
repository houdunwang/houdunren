@extends('edu.document.layouts.master')
@section('content')
    <form action="{{route('edu.document.update',$document)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>文档名称</label>
                    <input type="text" class="form-control" name="title" value="{{$document['title']}}"
                           aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <div id="editormd">
                        <textarea style="display:none;" name="content">{{$document['content']}}</textarea>
                    </div>
                    <script>
                        require(['hdjs'], function (hdjs) {
                            hdjs.editormd("editormd", {
                                width: '100%',
                                height: 300,
                                toolbarIcons: function () {
                                    return [
                                        "bold", "del", "italic", "quote", "|",
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
            <div class="card-footer">
                <button class="btn btn-primary btn-sm">保存</button>
            </div>
        </div>
    </form>
@endsection
