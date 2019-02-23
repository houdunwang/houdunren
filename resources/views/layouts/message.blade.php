@if(session()->has('error'))
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.swal({
                text: "{{session()->get('error')}}",
                button: false,
                icon: 'error'
            });
        })
    </script>
@endif

@if(session()->has('success'))
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.swal({
                text: "{{session()->get('success')}}",
                button: false,
                icon: 'success',
                timer: 1000
            });
        })
    </script>
@endif
@if(session()->has('info'))
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.swal({
                text: "{{session()->get('info')}}",
                button: false,
                icon: 'info',
                timer: 20000
            });
        })
    </script>
@endif

@if($errors->any())
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.swal({
                text: "@foreach($errors->all() as $k=>$error)  {{$error}} \n @endforeach",
                button: false,
                icon: 'warning'
            });
        })
    </script>
@endif
