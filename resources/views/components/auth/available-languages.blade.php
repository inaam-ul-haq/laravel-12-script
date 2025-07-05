<h4 class="">{{ __('Available Languages') }}</h4>
<select class="form-control" name="available" id="available">
    <option value="" disabled selected>{{ __('Add new language ↓') }}</option>
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if (!in_array($localeCode, $langauges))
            <option value="{{ $localeCode }}" @if ($default_language === $localeCode) {{ 'selected' }} @endif>
                {{ $localeCode }} - {{ ucfirst($properties['native']) }}
            </option>
        @endif
    @endforeach
</select>
