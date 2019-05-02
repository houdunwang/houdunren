<div class="form-group">
    <label>{{$field['title']}}</label>
    <div id="{{$field['name']}}">
        <textarea style="display:none;" name="{{$field['name']}}">{{old($field['name'],$field['value'])}}</textarea>
    </div>
    @push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.editormd("{{$field['name']}}", {
                width: '100%',
                height: 300,
            });
        });

    </script>
    @endpush
</div>
