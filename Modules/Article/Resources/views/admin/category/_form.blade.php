<ul class="nav nav-pills" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="base-tab" data-toggle="tab" href="#base" role="tab" aria-controls="base"
       aria-selected="true">基本资料</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category"
       aria-selected="false">模板定义</a>
  </li>
</ul>
<div class="tab-content mt-3" id="myTabContent">
  <div class="tab-pane fade show active" id="base" role="tabpanel" aria-labelledby="base-tab">
    <div class="p-3 border">
      <x-form theme="input" title="栏目名称" name="title" :required="true" :value="$category['title']??''" />
      <div class="form-group">
        <label for="">所属模型</label>
        <select class="form-control" name="model_id">
          @foreach ($models as $model)
          <option value="{{ $model['id'] }}">{{ $model['title'] }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>父级栏目</label>
        <select class="form-control" name="pid">
          <option value="0">--顶级栏目--</option>
          @foreach ($categories as $cat)
          <option value="{{ $cat['id'] }}" class="article-category-tree" {{ $cat['disabled']?'disabled':'' }}
                  {{ $cat['selected']?'selected':'' }}>
            {!! $cat['_title'] !!}
          </option>
          @endforeach
        </select>
      </div>

      <x-form theme="radio" title="栏目类型" name="type" :value="$category['type']??'list'"
              :options="['index'=>'封面模板','list'=>'普通模板']" />
      <x-form theme='textarea' title="栏目介绍" name="description" rows="3" :value="$category['description']" />
      <x-form theme="input" title="外部链接" name="url" :value="$category['url']??''" />
      <x-form theme="image" title="缩略图" name="thumb" :value="$category['thumb']??''" />
    </div>
  </div>

  <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
    <div class="p-3 border">
      <x-form theme="input" title="封面模板" name="template_index" value="{{ $category['template_index']??'index' }}" />
      <x-form theme="input" title="列表模板" name="template_list" value="{{ $category['template_list']??'list' }}" />
      <x-form theme="input" title="内容模板" name="template_content"
              value="{{ $category['template_content']??'content'}}" />
    </div>
  </div>
</div>

@push('styles')
<style>
  option:disabled {
    background: #f3f3f3;
  }
</style>
@endpush
