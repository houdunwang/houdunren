<div class="form-group">
    <label>{{$field['title']}}</label>
    <div class="input-group mb-1">
        <input type="text" class="form-control" name="{{$field['name']}}" readonly="" required
            value="{{old($field['name'],$field['value']?:asset('images/system/nopic.jpg'))}}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" onclick="upload_image('{{$field['name']}}')" type="button">
                选择文件
            </button>
        </div>
    </div>
    <img class="img-thumbnail d-block mt-1" id="qr"
        src="{{old($field['name'],$field['value']?:asset('images/system/nopic.jpg'))}}" style="width: 150px;">
    <span class="help-block">{{ $field['placeholder']??'' }}</span>
</div>
