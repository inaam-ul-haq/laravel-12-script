<select class="form-control" name="default_langauges" id="default_langauges">
    <option value="" disabled selected>{{ __('Select Default Language ↓') }}</option>
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if (in_array($localeCode, $langauges))
            <option value="{{ $localeCode }}" @if ($default_language === $localeCode) {{ 'selected' }} @endif>
                {{ ucfirst($properties['native']) }} @if ($default_language === $localeCode)
                    {{ __('(Default Language)') }}
                @endif
            </option>
        @endif
    @endforeach
</select>
