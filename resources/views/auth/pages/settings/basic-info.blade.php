<x-settings title="General Settings" sub-title="Change your system settings">
    <x-auth.card card-header="General Settings" header-button="true">
        <x-auth.form form-action="{{ route('settings.basic_info') }}" enctype="true">
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="site_name" id="site_name" required="true"
                                place="{{ __('language.site_name_placeholder') }}" val="{{ $data->name }}"
                                extraclasses="mb-3" label="{{ __('language.site_name_label') }}" />
                        </div>

                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="site_url" id="site_url" required="true"
                                place="{{ __('language.site_url_placeholder') }}" val="{{ $data->url }}"
                                extraclasses="mb-3" label="{{ __('language.site_url_label') }}" />
                        </div>

                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="site_email" id="site_email" required="true"
                                place="{{ __('language.site_email_placeholder') }}" val="{{ $data->email }}"
                                extraclasses="mb-3" label="{{ __('language.site_email_label') }}" />
                        </div>

                        <div class="col-md-12">
                            <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                                btn-value="{{ __('Update Basic Info') }}" />
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <x-auth.upload-file image="{{ $data->logo() }}" />
                </div>
            </div>
        </x-auth.form>
    </x-auth.card>
</x-settings>
