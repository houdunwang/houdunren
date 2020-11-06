<div id="wangEditor{{$name}}">
  <p>{!! $value !!}</p>
</div>
<textarea name="{{ $name }}" id="{{ $name }}Textarea" hidden></textarea>
@error($validateName($name))
<strong class="form-text text-danger small font-weight-bold" id="{{ $name.'errors' }}">{{ $message }}</strong>
@enderror
@push('scripts')
<script type="text/javascript" src="//unpkg.com/wangeditor/dist/wangEditor.min.js"></script>
<script type="text/javascript">
  const E = window.wangEditor
  const editor = new E("#wangEditor{{$name}}")
  const $textarea = document.getElementById("{{ $name }}Textarea");
  editor.config.onchange = function (html) {
      $textarea.value = html
      document.querySelector(`#{{$name}}errors`).remove();
  }
  editor.create()
  $textarea.value = editor.txt.html()
</script>
@endpush
