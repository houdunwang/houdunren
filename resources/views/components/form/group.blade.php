<div class="form-group {{ $class }}">
  <label for="{{ $name }}">{{ $title }}</label>
  <div class="input-group @error($validateName($name))is-invalid @enderror">
    <input type="text" class="form-control" name="{{ $name }}" id="{{ $name }}"
           placeholder="{{ $placeholder }}"
           value="{{ old( $name,$value ) }}"
           onfocus="this.parentElement.classList.remove('is-invalid')">
    <div class="input-group-append">
      <span class="input-group-text" id="basic-addon2">{{ $attributes['text'] }}</span>
    </div>
  </div>
  @error( $validateName($name) )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
