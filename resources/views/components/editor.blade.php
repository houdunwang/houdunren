@push("styles")
<link rel="stylesheet" href="https://cdn.staticfile.org/codemirror/5.55.0/codemirror.min.css" />
<link rel="stylesheet" href="/plugins/tuiEditor/dist/toastui-editor.css" />
<link rel="stylesheet" href="/plugins/tuiEditor/tuiEditor.css" />
@endpush

@push('comment')
<script src="https://cdn.staticfile.org/codemirror/5.55.0/codemirror.js"></script>
<script src="/plugins/tuiEditor/dist/toastui-editor.js"></script>
<script src="/plugins/tuiEditor/tuiEditor.js"></script>
<script>
    let editor =  hdEditor('#{{ $attributes['name'] }}',{
        action:"{{  $attributes['action'] }}",
        initialValue:window.{{ $attributes['name'] }},
        events: {
          //监听编辑器输入
          change: function () {
            const input = document.querySelector(`[name='{{ $attributes['name'] }}']`)
            input.value = editor.getMarkdown()
          },
        },
    })

    const el = document.getElementById(`{{ $attributes['name'] }}`);
    el.addEventListener('click',(el)=>{
        const errorEl = document.querySelector(`.error-{{ $attributes['name'] }}`)
        errorEl && errorEl.remove()
    })
</script>
@endpush
<div id="{{ $attributes['name'] }}" class="tuiEditor"></div>
@error( $attributes['name'] )
<strong class="form-text text-danger small font-weight-bold error-{{ $attributes['name'] }}">{{ $message }}</strong>
@enderror

<div class="text-secondary  mt-2">
    <i class="fas fa-info-circle    "></i> 你可以在编辑器底部切换为markdown模式，编辑器也支持托放上传图片。
</div>

<input type="hidden" name="{{ $attributes['name'] }}" />
