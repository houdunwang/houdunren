<div class="form-group">
    <label>{{$field['title']}}</label>
    <textarea id="{{$field['name']}}" name="{{$field['name']}}"
        style="height:300px;width:100%;">{{old($field['name'],$field['value']??'')}}</textarea>
</div>
@push('js')
<script>
    require(['hdjs'], function (hdjs) {
        hdjs.ueditor("{{$field['name']}}", {}, function (editor) {});
    })

</script>
@endpush
