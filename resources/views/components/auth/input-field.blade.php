<div class='required field'>
    @if ($label != null)
    <label for="{{ $id }}" class="form-label">
        {{ $label }}

        @if ($required)
        <span style="color: red;">*</span>
        @endif
    </label>
    @endif
    <input type='{{ $type }}' class='form-control {{ $extraclasses }} @error($name)
    is-invalid
    @enderror' id='{{ $id }}' name='{{ $name }}' placeholder='{{ $place }}' {{ $required == null ? '' : 'required' }}
        value='{{ $val == '' ? old($name) : $val }}' autocomplete="off">

    @if ($errors->has($name))
    <span for="{{ $id }}" class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
