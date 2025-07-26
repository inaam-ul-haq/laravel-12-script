<x-settings title="{{__('language.languages_title')}}" sub-title="{{__('language.languages_subtitle')}}">
    <x-auth.card card-header="{{__('language.languages_title')}}" header-button="">
        @php
        $default_language = $setting->default_language;
        $languages = $setting->languages;
        $supportedLocales = LaravelLocalization::getSupportedLocales();
        // Filter out the default language and list it first
        $otherLanguages = array_filter(
        $supportedLocales,
        function ($localeCode) use ($default_language) {
        return $localeCode !== $default_language;
        },
        ARRAY_FILTER_USE_KEY,
        );
        @endphp

        <x-slot:header-custom>
            <select class="form-control" name="default_languages" id="default_languages">
                <option value="" disabled selected>{{ __('language.default_language_title') }}</option>
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if (in_array($localeCode, $languages))
                <option value="{{ $localeCode }}" @if ($default_language===$localeCode) {{ 'selected' }} @endif>
                    {{ ucfirst($properties['native']) }} @if ($default_language === $localeCode)
                    {{ __('language.default_language') }}
                    @endif
                </option>
                @endif
                @endforeach
            </select>
        </x-slot:header-custom>

        <div class="alert alert-danger alert-outline-coloured alert-dismissible text-danger" role="alert">
            <div class="alert-message">
                <strong>{{ __('language.take_backup_warning') }}</strong><br>
                {{ __('language.backup_warning_text') }}
            </div>
        </div>

        <h4 class="">{{ __('language.available_languages') }}</h4>
        <select class="form-control" name="available" id="available">
            <option value="" disabled selected>{{ __('language.add_new_language') }}</option>
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if (!in_array($localeCode, $languages))
            <option value="{{ $localeCode }}" @if ($default_language===$localeCode) {{ 'selected' }} @endif>
                {{ $localeCode }} - {{ ucfirst($properties['native']) }}
            </option>
            @endif
            @endforeach
        </select>

        <h4 class="mt-3">{{ __('language.installed_languages') }}</h4>
        {{-- Display default language first --}}
        @if (in_array($default_language, $setting->installed_languages))
        <div class="bg-light p-3 mt-3 rounded-4">
            <label class="card-title h5" style="margin-bottom: 0px !important;"
                for="installed_languages{{ $default_language }}">{{ ucfirst($supportedLocales[$default_language]['native']) }}
                {{ __('language.default_language') }}
            </label>
        </div>
        @endif

        {{-- Display other installed languages --}}
        @foreach ($otherLanguages as $localeCode => $properties)
        @if (in_array($localeCode, $setting->installed_languages))
        <div class="bg-light p-3 mt-3 rounded-4">
            <div class="float-end">
                <x-auth.input-checkbox margin-top="0" name="installed_languages[]"
                    id="installed_languages{{ $localeCode }}" label="" onchange="installLanguage('{{ $localeCode }}')"
                    value="{{ in_array($localeCode, $setting->languages) ? 1 : 0 }}" />
            </div>
            <label class="card-title h5" style="margin-bottom: 0px !important;"
                for="installed_languages{{ $localeCode }}">{{ ucfirst($properties['native']) }}
                @if ($setting->default_language === $localeCode)
                {{ __('language.default_language') }}
                @endif
            </label>
        </div>
        @endif
        @endforeach

    </x-auth.card>

    @push('auth_scripts')
    <script>
        $('#default_languages').on('change', function() {
                var selectedLanguage = $(this).val();

                var url = "{{ route('settings.update_default_language') }}"

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        language: selectedLanguage
                    },
                    success: function(response) {
                        showToaster('success', 'Language changed successfully!', 'Success');

                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        showToaster('error', 'Error changing language', 'Error');
                    }
                });
            });

            $('#available').on('change', function() {
                var selectedAvailableLanguage = $(this).val();

                var url = "{{ route('settings.install_language') }}"

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        available: selectedAvailableLanguage
                    },
                    success: function(response) {
                        showToaster('success', 'Language changed successfully!', 'Success');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        showToaster('error', 'Error changing language', 'Error');
                    }
                });
            });

            function installLanguage(localeCode) {
                let id = "installed_languages" + localeCode;
                let isChecked = $('#' + id).prop('checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route('settings.active_language') }}',
                    method: 'POST',
                    data: {
                        locale: localeCode,
                        is_installed: isChecked,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status == '200') {
                            showToaster('success', response.message, 'Success');
                            location.reload();
                        } else {
                            showToaster('error', 'Language not activated!', 'Error');
                        }
                    },
                    error: function(xhr, status, error) {
                        showToaster('error', 'Requset error!', 'Error');
                    }
                });
            }
    </script>
    @endpush

</x-settings>
