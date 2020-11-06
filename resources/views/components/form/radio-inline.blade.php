<div class="d-flex align-items-center mb-3 {{ $class }}">
  <label for="{{ $name }}" class="mr-2 mb-0">{{ $title }}</label>
  <div class="d-flex align-items-center @error($validateName($name))is-invalid @enderror">
    @foreach ($options as $val=>$title)
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio"
             id="{{ $name.$val}}"
             class="custom-control-input"
             name="{{ $name }}"
             value="{{ $val }}"
             {{ $val==$value?"checked":'' }}>
      <label class="custom-control-label" for="{{ $name.$val}}">
        {{ $title }}
      </label>
    </div>
    @endforeach
  </div>
  @error( $validateName($name) )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
