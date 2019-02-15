<div class="card">
    <div class="card-header">
        服务套餐管理
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>服务套餐名称</label>
            <input type="text" name="name" class="form-control col-sm-6" required placeholder="请输入套餐中文名称" value="{{$package['name']??''}}">
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="is_default" value="1"
                    {{active_class($package['is_default']??'','checked')}}>
                    默认套餐
                </label>
            </div>
            <small id="helpId" class="text-muted">新注册用户默认使用的套餐</small>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        设置当前用户允许使用的模块
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-light small">
            <tr>
                <th scope="col" style="width: 150px;">
                    <label class="mb-0 text-secondary">
                        <input type="checkbox" name="modules[]" value="1"> (全选)选择
                    </label>
                </th>
                <th scope="col">模块名称</th>
                <th scope="col">模块标识</th>
                <th scope="col" class="w-50">功能简介</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input type="checkbox" name="" value="1">
                </td>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <span class="badge badge-success">30天</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        设置当前用户允许使用的模板
    </div>
    <div class="card-body">
        <table class="table small">
            <thead class="thead-light">
            <tr>
                <th scope="col" style="width: 150px;">
                    <label class="mb-0 text-secondary">
                        <input type="checkbox" name="" value="1"> (全选)选择
                    </label>
                </th>
                <th scope="col">模板名称</th>
                <th scope="col">模板标识</th>
                <th scope="col" class="w-50">模板描述</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">
                    <input type="checkbox" name="templages[]" value="1">
                </th>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <span class="badge badge-success">30天</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<button class="btn btn-primary mt-3">保存提交</button>