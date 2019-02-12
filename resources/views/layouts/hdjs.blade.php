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
                adminLte:"{{asset('org/AdminLTE-2.4.5')}}/dist/js/demo",
            },
            shim: {
                adminLte:{
                    deps:[
                        "bootstrap","jquery",
                        "{{asset('org/AdminLTE-2.4.5')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js",
                        "{{asset('org/AdminLTE-2.4.5')}}/bower_components/fastclick/lib/fastclick.js",
                        "{{asset('org/AdminLTE-2.4.5')}}/dist/js/adminlte.min.js",
                    ]
                }
            }
        },
    };
</script>
<script src="{{asset('org/hdjs/require.js')}}"></script>
<script src="{{asset('org/hdjs/config.js')}}"></script>