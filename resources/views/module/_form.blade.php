@include('module._tabs')
<div class="card">
    <div class="card-header">模块设计</div>
    <div class="card-body">
        <div class="form-group">
            <label>模块名称</label>
            <input type="text" name="title" class="form-control" value="{{old('title',$module['title']??'')}}" required>
            <small class="text-muted">请输入模块中文名称</small>
        </div>
        @if (if_route('module.create'))
            <div class="form-group">
                <label>模块英文标识</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$module['name']??'')}}" required>
                <small class="text-muted">请输入模块英文标识，用于创建模块目录使用</small>
            </div>
        @endif
        <div class="form-group">
            <label>预览图</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="thumb"
                       value="{{old('thumb',$module['package']['thumb']??'')}}" readonly>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="uploadThumb(this)" type="button">
                        选择图片
                    </button>
                </div>
            </div>
            <img class="img-thumbnail d-block" src="{{old('thumb',$module['package']['thumb']??asset('images/nopic.jpg'))}}">
            <span class="text-muted">请输入500x300的模块预览图片，图片类型要求为jpeg</span>
            @push('js')
                <script>
                    function uploadThumb(obj) {
                        require(['hdjs'], function (hdjs) {
                            hdjs.image(function (images) {
                                $("[name=thumb]").val(images[0]);
                                $(".img-thumbnail").attr('src', images[0]);
                            })
                        });
                    }
                </script>
            @endpush
        </div>
        <div class="form-group">
            <label>系统菜单</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="config" value="1"
                                {{active_class($module['package']['config']??true,'checked')}}> 模块配置
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="domain" value="1"
                                {{active_class($module['package']['domain']??true,'checked')}}> 域名管理
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="wx_replies" value="1"
                                {{active_class($module['package']['wx_replies']??true,'checked')}}> 微信回复列表
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="wx_cover" value="1"
                                {{active_class($module['package']['wx_cover']??true,'checked')}}> 微信封面入口
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="menu_web" value="1"
                                {{active_class($module['package']['menu_web']??true,'checked')}}> 桌面会员中心菜单
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="menu_mobile" value="1"
                                {{active_class($module['package']['menu_mobile']??true,'checked')}}> 手机会员中心菜单
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        微信消息处理
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="subscribe" value="1"
                            {{active_class($module['package']['subscribe']??true,'checked')}}>
                    微信订阅消息处理
                </label>
            </div>
            <small class="text-muted d-block">
                当前模块能够直接处理的消息类型. 如果公众平台传递过来的消息类型不在设定的类型列表中, 那么系统将不会把此消息路由至此模块
            </small>
            <span class="badge badge-info"></span>
            <div class="alert alert-warning small">
                注意: 订阅的消息信息是只读的, 只能用作分析统计 <br>
                订阅消息在 system/subscribe.php 文件中实现
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="processor" value="1"
                            {{active_class($module['package']['processor']??true,'checked')}}>
                    直接处理微信消息
                </label>
            </div>
            <div class="alert alert-warning small">
                注意: 关键字路由只能针对文本消息有效, 文本消息最为重要. 其他类型的消息并不能被直接理解, 多数情况需要使用文本消息来进行语境分析, 再处理其他相关消息类型
                <br>
                直接处理消息在 system/processor.php 文件中实现
            </div>
            <span class="badge badge-info"></span>
        </div>
    </div>
</div>
<button class="btn btn-success mt-3">保存提交</button>