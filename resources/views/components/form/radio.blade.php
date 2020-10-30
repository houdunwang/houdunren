<div class="form-group {{ $attributes['class']??'' }}">
  <label for="{{ $name }} col-sm-2 col-form-label">
    {{ $title }}
  </label>

  <div class="input-group  @error($name)is-invalid @enderror">
    @foreach ($options as $val=>$title)
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" value="{{ $value }}" id="{{ $name.$val }}" name="{{ $name }}"
             class="custom-control-input"
             {{ $value==$val?"checked":'' }}>
      <label class="custom-control-label" for="{{ $name.$val }}">{{ $title }}</label>
    </div>
    @endforeach
  </div>

  @error( $name )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
