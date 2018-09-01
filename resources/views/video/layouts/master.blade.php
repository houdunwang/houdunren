
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/libs/flatpickr/dist/flatpickr.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/css/theme.min.css">
    <title>{{hd_config('site.webname')}}</title>
</head>
<body>
@include('video.layouts._header')
<div class="main-content">
     @yield('content')
</div>
@include('video.layouts._footer')
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/jquery/dist/jquery.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/chart.js/dist/Chart.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/chart.js/Chart.extension.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/highlight/highlight.pack.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/flatpickr/dist/flatpickr.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/list.js/dist/list.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/quill/dist/quill.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/dropzone/dist/min/dropzone.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/libs/select2/dist/js/select2.min.js"></script>--}}
{{--<script src="{{asset('org/Dashkit-1.1.2')}}/js/theme.min.js"></script>--}}
@include('layouts._hdjs')
<script>
    require(['jquery', 'bootstrap'], function ($) {});
</script>
</body>
</html>
