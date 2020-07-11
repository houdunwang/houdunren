@foreach(['success','info','danger','warning'] as $type)
@if(session()->has($type))
<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    <i class="fa fa-info-circle" aria-hidden="true"></i> {{session()->get($type)}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endforeach
