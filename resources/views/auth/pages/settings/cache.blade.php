<x-settings title="{{__('language.cache_title')}}" sub-title="{{__('language.cache_subtitle')}}">
    <x-auth.card card-header="{{__('language.cache_title')}}" header-button="true">
        <p>{{__('language.cache_subtitle')}}</p>
        <x-auth.form form-action="{{ route('settings.clear_cache') }}" enctype="">
            <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                btn-value="{{ __('language.clear_cache_button') }}" />
        </x-auth.form>
    </x-auth.card>
</x-settings>
