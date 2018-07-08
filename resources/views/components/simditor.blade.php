<textarea id="{{$id}}">{{$content??''}}</textarea>
@section('scripts')
    <script type="text/javascript" src="{{asset('plugin/simditor/scripts/module.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/simditor/scripts/hotkeys.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/simditor/scripts/uploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/simditor/scripts/simditor.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/simditor/styles/simditor.css')}}"/>
    <script>
        $(function () {
            var editor = new Simditor({
                textarea: $('#{{$id}}'),
                pasteImage: true,
                upload: true,
                upload: {
                    url: '/upload-simditor',
                    params: {_token: '{{ csrf_token() }}'},
                    fileKey: 'file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                }
            });
        });
    </script>
@endsection
