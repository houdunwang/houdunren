@inject('FieldServer', '\App\Servers\FieldServer')
<div class="form-group ">
    <label class="col-form-label pt-0">
        {{$field['title']}}
    </label>
    <div class="">
        @foreach ($FieldServer->params($field) as $param)
        <label class="mr-2">
            <input class="" type="checkbox" value="{{$param['value']}}" name="{{$field['name']}}[]"
                {{active_class(in_array($param['value'],is_array($model[$field['name']])?$model[$field['name']]:[$model[$field['name']]]),'checked')}}>
            {{$param['title']}}
        </label>
        @endforeach
    </div>
</div>
