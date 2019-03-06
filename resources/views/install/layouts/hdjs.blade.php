<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
<link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script>
    window.hdjs = {
        base: '/js/hdjs',
        uploader: '{{route('common.upload.make')}}?',
        filesLists: '{{route('common.upload.lists')}}?',
    };
</script>
<script src="{{asset('js/hdjs/require.js')}}"></script>
<script src="{{asset('js/hdjs/config.js')}}"></script>
