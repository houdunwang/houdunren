<div class="alert alert-info mt-3 small" role="alert">
  使用域名访问站点时优化使用文章模块
</div>
<div class="card mt-3">
  <div class="card-header">
    站点资料
  </div>
  <div class="card-body">
    <x-form name="title" required title="站点名称" value="{{isset($site)?$site['title']:'' }}"></x-form>
    <x-form name="domain" required title="访问域名" value="{{isset($site)?$site['domain']:'' }}"></x-form>
    <x-form theme="radio" name="domain_action" required title="域名访问动作" :options="['article'=>'文章','module'=>'模块']"
            :value="$site['domain_action']??'article'" />
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    文章模块使用的模板
  </div>
  <div class="card-body">
    <div class="row">
      @foreach ($templates as $template)
      <div class="col-2">
        <div class="card">
          <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <img src="{{ $template->preview }}" class="rounded-circle mb-3 preview-image"
                 style="width: 60px;">
            <h6>{{ $template->title }}</h6>
            <span class="text-secondary small text-center description">
              {{ $template->description }}
            </span>

            <div class="mt-3">
              <label>
                <input type="radio" hidden name="template_id" value="{{ $template['id'] }}"
                       {{isset($site) && $template['id']==$site['template_id']?'checked':'' }}>
                <span class="btn btn-secondary btn-sm">设置为默认</span>
              </label>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

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
        <div class="card">
          <div class="card-body text-center">
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
    background-color: teal;
  }
</style>
@endpush
