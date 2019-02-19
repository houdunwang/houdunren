<div class="card">
    <div class="card-header">
        网站基本配置
    </div>
    <div class="card-body">
        <div class="form-group col-sm-6">
            <label>网站名称</label>
            <input type="text" name="webname" class="form-control" value="{{old('webname',$config['webname']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>网站LOGO</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" name="logo" value="{{$config['logo']??''}}" readonly="">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadLogo()" type="button">
                        选择图片
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block" src="{{$config['logo']??asset('images/nopic.jpg')}}" style="width: 150px;">
            @push('js')
                <script>
                    function uploadLogo() {
                        require(['hdjs'], function (hdjs) {
                            hdjs.image(function (images) {
                                $("[name=logo]").val(images[0]);
                                $(".img-thumbnail").attr('src', images[0]);
                            })
                        });
                    }
                </script>
            @endpush
        </div>
        <div class="form-group col-sm-6">
            <label>网站关键字</label>
            <input type="text" name="keyword" class="form-control" value="{{old('keyword',$config['keyword']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>网站关键字</label>
            <textarea name="description" rows="3"
                      class="form-control">{{old('description',$config['description']??'')}}</textarea>
        </div>
        <div class="form-group col-sm-6">
            <label>ICP备案号</label>
            <input type="text" name="icp" class="form-control" value="{{old('icp',$config['icp']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>联系电话</label>
            <input type="text" name="tel" class="form-control" value="{{old('tel',$config['tel']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>联系邮箱</label>
            <input type="text" name="email" class="form-control" value="{{old('email',$config['email']??'')}}">
        </div>
        <div class="form-group col-sm-6">
            <label>网站统计代码</label>
            <textarea name="counter" rows="3"
                      class="form-control">{{old('counter',$config['counter']??'')}}</textarea>
        </div>
    </div>
</div>