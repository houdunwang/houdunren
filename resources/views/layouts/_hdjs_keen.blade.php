<script>
    window.hdjs = {
        base: '{{asset('org/hdjs')}}',
        uploader: '{{route('common.upload.upload')}}?',
        filesLists: '{{route('common.upload.lists')}}?',
        requireJs: {
            paths: {
                "app": "{{asset('org/keen')}}/app/scripts/bundle/app.bundle",
                'popper': '/js/popper.min',
                "tooltip": "{{asset('org/keen/demo/default/custom/components/base/tooltips')}}",
                "perfect-scrollbar": "https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min",
                {{--"popper": "{{asset('js/popper.min.js
                ')}}",--}}
                scripts: "{{asset('org/keen')}}/demo/default/base/scripts.bundle",
                {{--"sticky": "{{asset('org/keen/vendors/general/sticky-js/dist/sticky.min')}}",--}}
                // sticky: "component/sticky",
                sticky: "https://cdn.bootcss.com/sticky-js/1.2.0/sticky.compile",
                "wNumb": "{{asset('org/keen')}}/vendors/general/wnumb/wNumb",
                "js.cookie": "{{asset('org/keen')}}/vendors/general/js-cookie/src/js.cookie",
            },
            shim: {
                "js.cookie": {
                    exports: 'Cookies'
                },
                // "wNumb": {
                //     deps: ['sticky']
                // },
                // "sticky": {
                //     deps: ['jquery'],
                //     exports: 'Sticky',
                // init: function (Sticky) {
                //     alert(33)
                //     return new Sticky;
                // }
                // },
                "tooltip": {
                    deps: ['popper']
                },
                // // "popper": {
                // //     deps: ['bootstrap']
                // // },
                "perfect-scrollbar": {
                    exports: "PerfectScrollbar"
                },
                "scripts": {
                    deps: ['perfect-scrollbar', 'js.cookie']
                },
                "app": {
                    deps: [
                        // "popper",
                        "js.cookie",
                        "moment",
                        "tooltip",
                        "perfect-scrollbar",
                        // "sticky",
                        "wNumb",
                        "scripts"
                    ]
                }
            }
        }
    };
</script>
<script src="{{asset('org/hdjs/require.js')}}?version={{config('app.version')}}"></script>
<script src="{{asset('org/hdjs/config.js')}}?version={{config('app.version')}}"></script>
