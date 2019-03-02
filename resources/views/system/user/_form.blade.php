<ul class="nav nav-tabs mb-2">
    <li class="nav-item">
        <a class="nav-link" href="{{route('system.user.index')}}">
            用户列表
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">
            设置用户
        </a>
    </li>
</ul>
<div class="card">
    <div class="card-header">设置用户信息</div>
    <div class="card-body">
        <div class="form-group">
            <label>昵称</label>
            <input type="text" name="name" class="form-control col-sm-6" required
                   value="{{old('name',$user['name']??'')}}">
        </div>
        <div class="form-group">
            <label>邮箱</label>
            <input type="email" name="email" class="form-control col-sm-6"
                   value="{{old('email',$user['email']??'')}}">
        </div>
        <div class="form-group">
            <label>手机号</label>
            <input type="text" name="mobile" class="form-control col-sm-6"
                   value="{{old('mobile',$user['mobile']??'')}}">
        </div>
        <div class="form-group">
            <label>所属用户组</label>
            <div>
                <select class="custom-select my-1 mr-sm-2 col-sm-6" name="group_id">
                    @foreach($groups as $group)
                        <option value="{{$group['id']}}"
                                {{active_class(($user['group_id']??null)==$group['id'],'selected')}}>{{$group['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>至期时间</label>
            <input type="text" name="admin_end" id="datetimepicker" class="form-control col-sm-6" readonly
                   value="{{$user['admin_end']??\Carbon\Carbon::now()}}">
            @push('js')
                <script>
                    require(['hdjs'], function (hdjs) {
                        hdjs.datetimepicker('#datetimepicker', {
                            timepicker: false,
                            format: 'Y-m-d',
                            onChangeDateTime: function (dp, $input) {
                                console.log($input.val())
                            }
                        });
                    })
                </script>
            @endpush
            <span class="text-muted small">
                设置用户后台管理权限到期时间
            </span>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">用户其他资料</div>
    <div class="card-body">
        <div class="form-group">
            <label>真实姓名</label>
            <input type="text" name="real_name" class="form-control col-sm-6"
                   value="{{old('real_name',$user['real_name']??'')}}">
        </div>
        <div class="form-group">
            <label>GitHub</label>
            <input type="text" name="github" class="form-control col-sm-6"
                   value="{{old('github',$user['github']??'')}}">
        </div>
        <div class="form-group">
            <label>QQ</label>
            <input type="text" name="qq" class="form-control col-sm-6"
                   value="{{old('qq',$user['qq']??'')}}">
        </div>
        <div class="form-group">
            <label>微博</label>
            <input type="text" name="weibo" class="form-control col-sm-6"
                   value="{{old('weibo',$user['weibo']??'')}}">
        </div>
    </div>
</div>
<button class="btn btn-success mt-3">保存提交</button>