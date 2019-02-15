<div class="card">
    <div class="card-header">
        基本配置
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">网站标志</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="logo" value="{{$config['logo']??asset('images/logo.png')}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="uploadLogo(this)" type="button">选择图片</button>
                    </div>
                </div>
                <div class="input-group" style="margin-top:5px;">
                    <img src="{{$config['logo']??asset('images/logo.png')}}" class="img-fluid"
                         id="logo-img" style="background: #dcdcdc">
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        function uploadLogo(obj) {
            require(['hdjs'], function (hdjs) {
                hdjs.image(function (images) {
                    $(['name=logo']).val(images[0]);
                    $("#logo-img").attr('src',images[0]);
                })
            });
        }
    </script>
@endpush