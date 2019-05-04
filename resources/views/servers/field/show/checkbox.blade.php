@inject('FieldServer', '\App\Servers\FieldServer')

@foreach((array)$model[$field['name']] as $value)
<span class="badge badge-info">
    {!!$FieldServer->getTitleByValueFromParams($field,$value)!!}
</span>
@endforeach
