{{--后台编辑栏目--}}
    <div class="form-group">
        <label>分类名称</label>
        <input type="text" name="title" class="form-control" value="{{old('title',$category['title']??'')}}" placeholder="输入帖子分类名称" aria-describedby="helpId" required>
    </div>
    <div class="form-group">
        <label>分类描述</label>
        <textarea name="description" class="form-control" rows="5" placeholder="请输入栏目描述说明" required>{{old('description',$category['description']??'')}}</textarea>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{old('icon',$category['icon']??'fa fa-external-link')}}" aria-hidden="true" id="fa"></i> </span>
        </div>
        <input type="text" class="form-control" name="icon" value="{{old('icon',$category['icon']??'fa fa-external-link')}}" aria-label="Amount (to the nearest dollar)">
        <div class="input-group-append">
            <span class="input-group-text" onclick="selectIcon()">选择图标</span>
        </div>
    </div>


@push('js')
    <script>
        function selectIcon() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    $("[name=icon]").val(icon);
                    $("#fa").attr('class', icon);
                })
            })
        }
    </script>
@endpush