<div class="card mt-3 shadow-sm">
    <div class="card-header">
        用户组设置
    </div>
    <div class="card-body">
        <x-form title="组名称" name="title" required class="col-12 col-md-8" value="{{ $group['title']??'' }}">
        </x-form>
        <x-form title="可创建站点数量" name="site_num" type="number" required class="col-12 col-md-8"
            value="{{$group['site_num']??3 }}"></x-form>
    </div>
</div>

<div class="card mt-3 shadow-sm">
    <div class="card-header">
        套餐选择
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th width="80"> </th>
                    <th width="100">编号</th>
                    <th>套餐</th>
                    <th>可用模块</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)

                <tr>
                    <td>
                        @if(isset($group))
                        <input type="checkbox" name="packages[]" value="{{ $package['id'] }}"
                            {{$group->packages->contains($package)?'checked':'' }}>
                        @else
                        <input type="checkbox" name="packages[]" value="{{ $package['id'] }}">
                        @endif

                    </td>
                    <td> {{ $package->id }}</td>
                    <td>{{ $package->title }}</td>
                    <td>
                        @foreach($package->modules as $module)
                        <span class="badge badge-info mr-2">{{ $module['title'] }}</span>
                        @endforeach
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
<button class="btn btn-primary mt-3">保存</button>
