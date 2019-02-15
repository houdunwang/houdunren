<div class="panel panel-default">
    <div class="panel-heading">
        基本配置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">网站标志</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input class="form-control ng-pristine ng-untouched ng-valid" name="logo"
                           value="{{$config['logo']??asset('images/logo.png')}}" readonly="">
                    <div class="input-group-btn">
                        <button onclick="uploadLogo(this)" class="btn btn-default" type="button">选择图片</button>
                    </div>
                </div>
                <div class="input-group" style="margin-top:5px;">
                    <img src="{{$config['logo']??asset('images/logo.png')}}" class="img-responsive img-thumbnail"
                         width="150" id="logo-img" style="background: #dcdcdc">
                    <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片">×</em>
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