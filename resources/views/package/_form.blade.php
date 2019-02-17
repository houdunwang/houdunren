@inject('moduleRepository','App\Repositories\ModuleRepository')
@inject('templateRepository','App\Repositories\TemplateRepository')
<div class="card">
    <div class="card-header">
        服务套餐管理
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>服务套餐名称</label>
            <input type="text" name="name" class="form-control col-sm-6" required placeholder="请输入套餐中文名称"
                   value="{{$package['name']??''}}">
        </div>
    </div>
</div>
@if (count( $moduleRepository->all()))
    <div class="card mt-3">
        <div class="card-header">
            选择套餐使用的模块
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light small">
                <tr>
                    <th scope="col" style="width: 150px;">
                        <label class="mb-0 text-secondary">
                            {{--<input type="checkbox" name="modules[]" value="1"> (全选)选择--}}
                        </label>
                    </th>
                    <th scope="col">模块名称</th>
                    <th scope="col">模块标识</th>
                    <th scope="col" class="w-50"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($moduleRepository->all() as $module)
                    <tr>
                        <td>
                            <input type="checkbox" name="modules[]" value="{{$module['id']}}"
                                    {{active_class($package->module->contains($module),'checked')}}>
                        </td>
                        <td>{{$module['title']}}</td>
                        <td>{{$module['name']}}</td>
                        <td>
                            @if ($module['local'])
                                <span class="badge badge-success">本地模块</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@if (count($templateRepository->all()))
    <div class="card mt-3">
        <div class="card-header">
            选择套餐使用的模板
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light small">
                <tr>
                    <th scope="col" style="width: 150px;">
                        <label class="mb-0 text-secondary">
                            {{--<input type="checkbox" name="modules[]" value="1"> (全选)选择--}}
                        </label>
                    </th>
                    <th scope="col">模板名称</th>
                    <th scope="col">模板标识</th>
                    <th scope="col" class="w-50"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($templateRepository->all() as $template)
                    <tr>
                        <td>
                            <input type="checkbox" name="templates[]" value="{{$template['id']}}"
                                    {{active_class($package->template->contains($template),'checked')}}>
                        </td>
                        <td>{{$template['title']}}</td>
                        <td>{{$template['name']}}</td>
                        <td>
                            @if ($template['local'])
                                <span class="badge badge-success">本地模块</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
<button class="btn btn-success mt-3">保存提交</button>