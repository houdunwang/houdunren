<script>
    window.hdjs = {
        base: '{{asset('org/hdjs')}}',
        uploader: '{{route('common.upload.upload')}}?',
        filesLists: '{{route('common.upload.lists')}}?',
        requireJs: {
            paths: {
                'jquery-migrate': 'https://cdn.bootcss.com/jquery-migrate/3.0.1/jquery-migrate.min',
                'popper': 'https://cdn.bootcss.com/popper.js/1.14.4/umd/popper.min',
                'hs.megamenu': '/js/hs.megamenu',
                'jquery.validate': '/js/jquery.validate.min',
                'jquery.fancybox': '/js/jquery.fancybox.min',
                'slick': '/js/slick',

                'hs.core': '/org/front/js/hs.core',
                'hs.header': '/org/front/js/components/hs.header',
                'hs.focus-state': '/org/front/js/helpers/hs.focus-state',
                'hs.validation': '/org/front/js/components/hs.validation',
                'hs.fancybox': '/org/front/js/components/hs.fancybox',
                'hs.slick-carousel': '/org/front/js/components/hs.slick-carousel',
                'hs.unfold': '/org/front/js/components/hs.unfold',
                'hs.go-to': '/org/front/js/components/hs.go-to',
                'hs.show-animation': '/org/front/js/components/hs.show-animation'
            },
            shim: {
                'jquery-migrate': {deps: ['jquery', 'bootstrap']},
                'popper': {deps: ['jquery']},
                'hs.megamenu': {deps: ['jquery', 'popper']},
                'jquery.validate': {deps: ['jquery']},
                'jquery.fancybox': {deps: ['jquery']},
                'slick': {deps: ['jquery']},

                'hs.core': {
                    deps: ['jquery', 'popper', 'hs.megamenu', 'jquery.validate', 'jquery.fancybox', 'slick'],
                    exports: '$'
                },
                'hs.header': {deps: ['hs.core']},
                'hs.focus-state': {deps: ['hs.core']},
                'hs.validation': {deps: ['hs.core']},
                'hs.fancybox': {deps: ['hs.core']},
                'hs.slick-carousel': {deps: ['hs.core', 'slick']},
                'hs.unfold': {deps: ['hs.core']},
                'hs.go-to': {deps: ['hs.core']},
                'hs.show-animation': {deps: ['hs.core']}
            }
        }
    };
</script>
<script src="{{asset('org/hdjs/require.js')}}"></script>
<script src="{{asset('org/hdjs/config.js')}}"></script>
