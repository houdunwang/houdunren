<div class="card">
    <div class="card-header">
        创建用户组
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>会员组</label>
            <input type="text" name="name" class="form-control col-sm-6" required placeholder="请输入用户组中文名称"
            value="{{$group['name']??''}}">
        </div>
        <div class="form-group">
            <label>站点数量</label>
            <input type="text" name="site_num" class="form-control col-sm-6" required value="{{$group['site_num']??3}}">
            <small class="text-muted">可创建的站点数量</small>
        </div>
        <div class="form-group">
            <label>有效期限</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control col-sm-6" name="days" value="{{$group['days']??30}}" required>
                <div class="input-group-append">
                    <span class="input-group-text">天</span>
                </div>
            </div>
            <small class="text-muted">设置用户组的有效期限, 到期后该用户组的所有公众号只能使用 "基础服务"。</small>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        可使用的公众服务套餐
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-light small">
            <tr>
                <th scope="col" style="width: 150px;">
                    <label class="mb-0 text-secondary">
                        <input type="checkbox" onchange="selectAll(this)"> (全选)选择
                    </label>
                </th>
                <th scope="col">名称</th>
                <th scope="col">可用模块</th>
                <th scope="col">可用模板</th>
            </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
                <tr>
                    <td>
                        <input type="checkbox" name="packages[]" value="{{$package['id']}}"
                        {{active_class($groupPackages->contains($package),'checked')}}>
                    </td>
                    <td>{{$package['name']}}</td>
                    <td>
                        <span class="badge badge-info">sdf</span>
                    </td>
                    <td>
                        <span class="badge badge-success">sdf</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<button class="btn btn-primary mt-3">保存提交</button>


@push('js')
    <script>
        function selectAll() {
            $("tbody [type='checkbox']").each(function () {
                $(this).prop('checked', !$(this).prop('checked'));
            })
        }
    </script>
@endpush