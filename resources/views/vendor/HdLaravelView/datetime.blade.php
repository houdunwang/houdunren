<div class="form-group row">
    <label for="{{$field['name']}}" class="col-12 col-sm-3 col-form-label text-md-right">{{$field['title']}}</label>
    <div class="col-12 col-md-9">
        <hd-datetimepicker name="{{$field['name']}}" id="{{$field['name']}}" value="{{$field['value']}}"></hd-datetimepicker>
    </div>
</div>
