@extends('edu.document.layouts.master',['document' => $chapter->document])
@section('document_content')
    <div class="container">
        <form action="{{route('edu.section.update',$section)}}" method="post" id="sectionForm">
            @csrf @method('PUT')
            <input type="hidden" name="chapter_id" value="{{$chapter['id']}}">
            <div class="card">
                <div class="card-header">
                    编辑节
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">节名称</label>
                        <input type="text" name="title" class="form-control" value="{{$section['title']}}">
                    </div>
                    <div class="form-group">
                        <label for="">内容</label>
                        <div id="editormd">
                            <textarea style="display:none;" name="content">{{$section['content']}}</textarea>
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
                <div class="card-footer text-muted">
                    <button class="btn btn-primary btn-sm">保存提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('css')
    <link href="https://cdn.bootcss.com/animate.css/3.7.0/animate.min.css" rel="stylesheet">
@endpush
@push('js')

    <script>
        setInterval(function () {
            autosave();
        }, 10000)

        function autosave() {
            require(['hdjs', 'iziToast','bootstrap'], function (hdjs,iziToast) {
                $.ajax({
                    method: 'PUT',
                    url: "{{route('edu.section.update',$section)}}",
                    data: $('#sectionForm').serialize(),
                    success: function (response) {
                        if (response.code == 1) {
                            iziToast.show({
                                theme: 'dark',
                                icon: 'fa fa-info-circle',
                                timeout: 1500,
                                message: response.message,
                                position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                                progressBarColor: 'rgb(255, 255, 255)',
                            });
                        }
                    },
                    error:function (response) {
                        //console.log(response.responseJSON.errors.title)
                    }
                })
            })
        }
    </script>
    <script>
        require(['hdjs'], function (hdjs) {
            $('input[name=title]').keyup(function () {
                $("#section_{{$section['id']}}").html($(this).val());
            })
        })
    </script>
@endpush
