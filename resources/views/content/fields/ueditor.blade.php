<div class="form-group">
    <label>{{$field['title']}}</label>
    <textarea id="ext-{{$field['name']}}" style="height:300px;width:100%;" name="fields[{{$field['name']}}]">{{old('fields.'.$field['name'],$article[$field['name']]??'')}}</textarea>
        <script>
            require(['hdjs'], function (hdjs) {
                hdjs.ueditor("ext-{{$field['name']}}");
            })
        </script>
</div>