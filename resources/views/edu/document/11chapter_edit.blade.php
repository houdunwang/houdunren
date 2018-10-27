@extends('edu.document.layouts.master')
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div>
                    <div class="card-header">
                        sdf
                    </div>
                    <div class="card-block">
                        <div class="list-group border-0">
                            <a href="#" class="list-group-item list-group-item-action border-0"
                            >df</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-light btn-sm" >添加节</button>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-primary btn-sm" href="{{route('edu.chapter.create',['document_id'=>$document])}}">添加大章</a>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('edu.document.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>文档名称</label>
                            <input type="text"  class="form-control" placeholder="" value="{{$document['title']}}"
                                   aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <div id="editormd">
                                <textarea style="display:none;">{{$document['content']}}</textarea>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection