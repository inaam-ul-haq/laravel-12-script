<div class='required field'>
    @if ($label != null)
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @if ($required)
    <span style="color: red;">*</span>
    @endif
    @endif

    <textarea class="form-control {{ $extraclasses }} @error($name)
    is-invalid
    @enderror" id='{{ $id }}' name='{{ $name }}' placeholder='{{ $place }}' {{ $attributes }}
        {{ $required == null ? '' : 'required' }} value='{{ $val == '' ? old($name) : $val }}'
        row="3">{{ $val == '' ? old($name) : $val }}</textarea>

    @if ($errors->has($name))
    <span for="{{ $id }}" class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>