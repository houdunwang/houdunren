<div id="{{ $name }}" class="editor-container"></div>
{{-- 表单验证 --}}
@error($name)
<strong class="form-text text-danger small font-weight-bold error-{{$name}}">{{ $message }}</strong>
@enderror

<div class="text-secondary mt-2 small">
  <i class="fas fa-info-circle"></i> 你可以在编辑器底部切换为markdown模式，编辑器也支持托放上传图片。
</div>

{{-- 同步编辑器内容提交到后使用 --}}
<textarea name="{{ $name }}" hidden>{{ $value }}</textarea>

@push('scripts')
<script src="https://cdn.staticfile.org/codemirror/5.55.0/codemirror.js"></script>
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
<script src="/plugins/tuiEditor/tuiEditor.js"></script>
<script>
  const textarea = document.querySelector(`[name="{{ $name }}"]`);
  new TotalEditor({
    el:`#{{ $name }}`,
    //图片上传地址
    action:`{{ $action }}`,
    //编辑器高度
    height:{{ $height }},
    //编辑器类型
    type:'markdown',
    //初始值
    content:textarea.value,
    //编辑器内容更改后回调
    onchange:(content)=>{
      textarea.value = content;
    }
  });
</script>
@endpush

@push("styles")
<link rel="stylesheet" href="https://cdn.staticfile.org/codemirror/5.55.0/codemirror.min.css" />
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />

<style>
  .editor-container {
    border: solid 1px #ddd;
  }
</style>
@endpush
