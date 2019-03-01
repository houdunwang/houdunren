<script>
    window.hdjs = {
        base: '/org/hdjs',
        uploader: '{{route('common.upload.make')}}?',
        filesLists: '{{route('common.upload.lists')}}?',
    };
    window.system = {
        upload:{!! json_encode(config_get('upload','','system')) !!},
        user:{!! json_encode(config_get('user',[],'site')) !!},
        message_timeout: {!! config_get('notify.message_timeout',60,'site') !!}
    }
</script>
<script src="{{asset('org/hdjs/require.js')}}"></script>
<script src="{{asset('org/hdjs/config.js')}}"></script>
