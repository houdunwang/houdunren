<div class="form-group">
    <label>{{$field['title']}}</label>
    <textarea id="{{$field['name']}}" name="content"
              style="height:300px;width:100%;">{{old($field['name'],$field['value']??'')}}</textarea>
</div>
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.ueditor({{$field['name']}});
        })
    </script>
@endpush