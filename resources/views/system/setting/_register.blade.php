<div class="card">
    <div class="card-header">
        注册设置
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label">
                体验天数
                <small class="text-secondary">(days)</small>
            </label>
            <div class="col-sm-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="days"
                           value="{{$config['days']??365}}">
                    <div class="input-group-append">
                        <span class="input-group-text">天</span>
                    </div>
                </div>
                <span class="help-block small text-secondary">可使用后台管理权限的天数</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">
                默认会员组
                <small class="text-secondary">(group_id)</small>
            </label>
            <div class="col-sm-5">
                <select class="custom-select my-1" name="group_id">
                    @foreach(\App\Models\Group::all() as $group)
                        <option value="{{$group['id']}}" {{active_class(($config['group_id']??null)==$group['id'],'selected')}}>{{$group['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>