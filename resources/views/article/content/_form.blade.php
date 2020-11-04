<div class="p-3 border">
  @if (if_route('article.content.create'))
  <x-form title="栏目" name="_category" type="title" disabled :value="$category['title']"></x-form>
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

  @foreach ($category->model->systemFields as $field)
  @if ($field['show']==1)
  <x-form :theme="$field['type']" :name="$field['name']" :title="$field['title']" class="mt-3"
          :placeholder="$field['placeholder']" :required="$field['required']"
          :options="$field['options']" />
  @endif
  @endforeach

  {{-- <x-form title="标题" name="title" :value="$content['title']??''"></x-form>
  <x-form title="文章来源" name="source" :value="$contet['source']??''"></x-form>
  <x-form title="作者" name="author" :value="$contet['author']??''"></x-form>
  <x-form title="跳转地址" name="url" :value="$contet['url']??''"></x-form>
  <x-form theme="wangEditor" name="content"></x-form> --}}

  {{-- 扩展字段 --}}
  {{-- <x-article.field :category="$category" /> --}}
</div>
<button class="btn btn-primary mt-3">保存提交</button>
