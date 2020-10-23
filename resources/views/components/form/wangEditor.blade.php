<div id="wangEditor{{$attributes['name']}}">
  <p>{{ $slot }}</p>
</div>
<textarea id="{{ $attributes['name'] }}Textarea" hidden></textarea>

@push('scripts')
<script type="text/javascript" src="//unpkg.com/wangeditor/dist/wangEditor.min.js"></script>
<script type="text/javascript">
  const E = window.wangEditor
  const editor = new E("#wangEditor{{$attributes['name']}}")
  const $textarea = document.getElementById("{{ $attributes['name'] }}Textarea");

  editor.config.onchange = function (html) {
      // 第二步，监控变化，同步更新到 textarea
      $textarea.value = html
  }
  editor.create()
  // 第一步，初始化 textarea 的值
  $textarea.value = editor.txt.html()
</script>
@endpush
