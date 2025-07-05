<x-settings title="Clear Site Cache" sub-title="Clear all application cache files">
    <x-auth.card card-header="Clear Site Cache" header-button="true">
        <p>Clear all application cache files</p>
        <x-auth.form form-action="{{ route('settings.clear_cache') }}" enctype="">
            <x-auth.input-button btn-class="btn-primary" btn-type="submit" btn-value="{{ __('Clear Cache') }}" />
        </x-auth.form>
    </x-auth.card>
</x-settings>
