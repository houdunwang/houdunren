@if(session()->has('error'))
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.swal({
                text: "{{session()->get('error')}}",
                button: false,
                icon: 'info'
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
