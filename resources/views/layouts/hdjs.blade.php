<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
<link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{mix('css/app.css')}}">
<script>
    window.hdjs = {
        base: '/js/hdjs',
        uploader: '{{route('member.upload.make')}}?sid={{site()["id"]}}&',
        filesLists: '{{route('member.upload.lists')}}?sid={{site()["id"]}}&',
    };
    window.system = {
        message_timeout: {!! config_get('notify.message_timeout',60,'site') !!},
        upload:{!! json_encode(config_get('upload',[],'site')) !!},
    };
    window.sid = {{\site()['id']}};
    window.user_id = {{auth()->id()??0}}
</script>
<script src="{{asset('js/hdjs/require.js')}}"></script>
<script src="{{asset('js/hdjs/config.js')}}"></script>
<script src="{{mix('js/util.js')}}"></script>
<script> require(['bootstrap']); </script>
@stack('css')
<script>
    require(['bootstrap'], function () {
        $(function () {
            $('[data-toggle="popover"]').popover({
                trigger: 'hover'
            })
        });
    });
</script>
