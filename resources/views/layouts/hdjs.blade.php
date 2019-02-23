<script>
    window.hdjs = {
        //组件目录必须绝对路径
        base: '/org/hdjs',
        //上传文件后台地址
        uploader: '{{route('common.upload.make')}}?',
        //获取文件列表的后台地址
        filesLists: '{{route('common.upload.lists')}}?',
        //require.js配置项（可为空）
        requireJs: {
            paths: {
                util: '/util/util',
            }
        }
    };
</script>
<script src="{{asset('org/hdjs/require.js')}}"></script>
<script src="{{asset('org/hdjs/config.js')}}"></script>
<script>
    let system = {
        upload:{!! json_encode(config_get('upload','','system')) !!}
    }
</script>