<div class="p-3 border">
  @if (if_route('article.admin.content.create'))
  <x-form :hidden="true" :readonly="true" :hidden="true" name="category_id" :value="$category['id']" />
  <x-form title="栏目" :disabled="true" :value="$category['title']" />
  @else
  <div class="form-group">
    <label>栏目选择</label>
    <select class="form-control article-category-tree" name="category_id">
      @foreach ($categories as $category)
      <option value="{{ $category['id'] }}" {{ $category['type']=='index'?'disabled':'' }}
              class="article-category-tree">
        {!! $category['_title']!!}
      </option>
      @endforeach
    </select>
  </div>
  @endif

  {{-- 系统字段 --}}
  @foreach ($category->model->systemFields as $field)
  @if ($field['show']==1)
  <x-form :theme="$field['type']" :name="$field['name']" :title="$field['title']" class="mt-3"
          :placeholder="$field['placeholder']"
          :value="$content[$field['name']]"
          :required="$field['required']"
          :options="$field['options']" />
  @endif
  @endforeach
  {{-- 扩展字段 --}}
  @foreach ($category->model->fields as $field)
  @if($field['show'])
  <x-form :theme="$field['type']" :title="$field['title']" name="field[{{ $field['name'] }}]"
          :placeholder="$field['placeholder']" :options="$field->formatOptions()" required="$field['required']"
          :value="$field['value']??''" />
  @endif
  @endforeach
</div>
<button class="btn btn-primary mt-3">保存提交</button>
