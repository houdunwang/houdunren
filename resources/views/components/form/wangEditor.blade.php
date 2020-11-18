<div id="wangEditor{{$name}}">
  <p>{!! $value !!}</p>
</div>
<textarea name="{{ $name }}" id="{{ $name }}Editor" hidden></textarea>

@error($validateName($name))
<strong class="form-text text-danger small font-weight-bold" id="{{ $name.'errors' }}">{{ $message }}</strong>
@enderror

@push('scripts')
<script type="text/javascript" src="//unpkg.com/wangeditor/dist/wangEditor.min.js"></script>
<script type="text/javascript">
  const E = window.wangEditor
  const editor = new E("#wangEditor{{$name}}")
  const $textarea = document.getElementById("{{ $name }}Editor");
  editor.config.onchange = function (html) {
      //保存到表单中准备提交
      $textarea.value = html
      //有输入时移除错误消息
      const errorEl = document.querySelector(`#{{$name}}errors`);
      if(errorEl){
        errorEl.remove();
      }
  }
  editor.create()
  $textarea.value = editor.txt.html()
</script>
@endpush
