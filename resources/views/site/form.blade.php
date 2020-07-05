<div class="card mt-3">
    <div class="card-header">
        站点资料
    </div>
    <div class="card-body">
        <x-form name="title" required title="站点名称" value="{{isset($site)?$site['title']:'' }}"></x-form>
        <x-form name="domain" required title="访问域名" value="{{isset($site)?$site['domain']:'' }}"></x-form>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        默认模块
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($modules as $module)
            <div class="col-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $module['title'] }}
                        </h5>
                        <p class="card-text text-secondary">{{ $module['description'] }}</p>
                        <label>
                            <input type="radio" hidden name="module_id" value="{{ $module['id'] }}"
                                {{isset($site) && $module['id']==$site['module_id']?'checked':'' }}>
                            <span class="btn btn-secondary btn-sm">设置为默认</span>
                        </label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<button class="btn btn-primary mt-3">保存</button>

@push('styles')
<style>
    input[type='radio']:checked+span {
        background: #EA4A57;
    }
</style>
@endpush
