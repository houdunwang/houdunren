<div class="card">
  <div class="card-header">
    基本资料
  </div>
  <div class="card-body">
    <x-form theme="input" title="模型标题" name="title" required value="{{ $model['title']??'' }}"></x-form>
    <x-form theme="textarea" title="模型描述" name="description" rows="3" required>{{ $model['description']??'' }}</x-form>
  </div>
</div>