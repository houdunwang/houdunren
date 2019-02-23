<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link" href="{{route('module.menu.index',['type'=>request()->query('type')])}}">
            菜单列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">
            设置菜单
        </a>
    </li>
</ul>
<div class="card">
    <div class="card-header">
        桌面会员中心菜单设置
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>菜单名称</label>
            <input type="text" name="title" class="form-control" value="{{old('title',$menu['title']??'')}}">
        </div>
        <div class="form-group">
            <label>状态</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status" value="1"
                                {{active_class(old('status',$menu['status']??true) == true,'checked')}}> 显示
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status" value="0"
                                {{active_class(old('status',$menu['status']??false) == false,'checked')}}> 隐藏
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>跳转链接</label>
            <input type="text" name="url" class="form-control" value="{{old('url',$menu['url']??'')}}" required>
        </div>
        <div class="form-group">
            <label>菜单排序</label>
            <input type="text" name="rank" class="form-control" value="{{old('rank',$menu['rank']??0)}}" required>
        </div>
        <div class="form-group">
            <label>菜单图标</label>
            <div class="input-group">
                <input type="text" class="form-control" name="icon" required
                       value="{{old('icon',$menu['icon']??'fa fa-external-link')}}" readonly>
                <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="{{old('icon',$menu['icon']??'fa fa-external-link')}}" id="icon"></i>
                            </span>
                    <a href="javascript:void(0);" class="input-group-text" onclick="loadFont()">选择图标</a>
                </div>
                <script>
                    function loadFont() {
                        require(['hdjs'], function (hdjs) {
                            hdjs.font(function (icon) {
                                $("[name=icon]").val(icon);
                                $("#icon").attr('class',icon);
                            })
                        })
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-success mt-3">保存提交</button>