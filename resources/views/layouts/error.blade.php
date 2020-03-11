@if($errors->any())
<div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)
  {{ $error }} <br />
  @endforeach
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
  <i class="fa fa-info-circle" aria-hidden="true"></i>
  {{session()->get('error')}}
</div>
@endif
