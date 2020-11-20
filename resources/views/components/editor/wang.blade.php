<div id="wangEditor{{$name}}">
  <p>{!! $value !!}</p>
</div>
<textarea name="{{ $name }}" id="{{ $name }}Editor" hidden></textarea>

@error($validateName($name))
<strong class="form-text text-danger small font-weight-bold" id="{{ $name.'errors' }}">{{ $message }}</strong>
@enderror

@push('scripts')
<script src="https://cdn.bootcdn.net/ajax/libs/axios/0.21.0/axios.min.js"></script>
<script type="text/javascript" src="//unpkg.com/wangeditor/dist/wangEditor.min.js"></script>
<script type="text/javascript">
  {
    const editor = new wangEditor("#wangEditor{{$name}}");
    editor.config.uploadImgServer = `{{$action?? route('common.upload.wangEditor') }}`
    editor.config.uploadImgMaxSize = 2 * 1024 * 1024
    editor.config.uploadImgMaxLength = 5
    editor.config.uploadFileName = 'file'
    editor.config.showLinkImg = false
    editor.config.debug = true
    editor.config.zIndex = 100
    editor.config.uploadImgHeaders = {
      'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").content,
      Accept: 'application/json',
    }
    const textarea = document.getElementById("{{ $name }}Editor");
    editor.config.onchange = (html)=> {
      //保存到表单中准备提交
      textarea.value = html
      //有输入时移除错误消息
      const errorEl = document.querySelector(`#{{$name}}errors`);
      if(errorEl) errorEl.remove();
    }
    editor.config.height = {{$height}}
    editor.create()
    textarea.value = editor.txt.html()
  }
</script>
@endpush
