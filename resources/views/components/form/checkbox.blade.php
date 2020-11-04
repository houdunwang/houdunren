<div class="form-group {{ $attributes['class']??'' }}">
  <label for="{{ $name }}" class="">{{ $title }}</label>
  <div class="input-group @error($name)is-invalid @enderror">
    @foreach ($options as $val=>$title)
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" value="{{ $val }}" id="{{ $name.$val }}"
             name="{{ $name }}" class="custom-control-input"
             {{ isset($value) && in_array($val,$value)?"checked":'' }}>
      <label class="custom-control-label" for="{{ $name.$val }}">{{ $title }}</label>
    </div>
    @endforeach
  </div>
  @error( $name )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
