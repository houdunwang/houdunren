<div class="form-group {{ $class }}">
  <label for="{{ $name }}">{{ $title }}</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="deee">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
  <div class="custom-file @error($validateName($name))is-invalid @enderror">
    <input type="file" class="custom-file-input" id="{{ $name }}" name="{{ $name }}"
           value="{{ old( $name,$value ) }}">
    <label class="custom-file-label" for="{{ $name }}"
           data-browse="选择">{{ $placeholder }}</label>
  </div>
  @error( $validateName($name) )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
