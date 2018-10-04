<script>
    window.hdjs = {};
    //组件目录必须绝对路径
    window.hdjs.base = '{{asset('org/hdjs')}}';
    //上传文件后台地址
    window.hdjs.uploader = '{{route('common.upload.upload')}}?';
    //获取文件列表的后台地址
    window.hdjs.filesLists = '{{route('common.upload.lists')}}?';
</script>
<script src="{{asset('org/hdjs/require.js')}}"></script>
<script src="{{asset('org/hdjs/config.js')}}"></script>
