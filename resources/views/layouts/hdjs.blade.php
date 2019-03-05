<link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script>
    window.hdjs = {
        base: '/js/hdjs',
        uploader: '{{route('common.upload.make')}}?',
        filesLists: '{{route('common.upload.lists')}}?',
    };
    window.system = {
        upload:{!! json_encode(config_get('upload','','system')) !!},
        user:{!! json_encode(config_get('user',[],'site')) !!},
        message_timeout: {!! config_get('notify.message_timeout',60,'site') !!}
    }
</script>
<script src="{{asset('js/hdjs/require.js')}}"></script>
<script src="{{asset('js/hdjs/config.js')}}"></script>
