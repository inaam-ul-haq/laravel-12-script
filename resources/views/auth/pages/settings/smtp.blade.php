<x-settings title="{{__('language.smtp_title')}}" sub-title="{{__('language.smtp_subtitle')}}">
    <x-auth.card card-header="{{__('language.smtp_title')}}" header-button="true">
        <x-auth.form form-action="{{ route('settings.smtp_update') }}" enctype="true">
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="host" id="host" place="{{__('language.enter_host')}}"
                        val="{{ $data->smtp_host }}" required="true" label="{{__('language.smtp_host')}}" />
                </div>
                <div class="col-md-6">
                    <x-auth.input-field type="number" name="port" id="port" place="{{__('language.enter_port')}}"
                        val="{{ $data->smtp_port }}" required="true" label="{{__('language.smtp_port')}}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="username" id="username"
                        place="{{__('language.enter_username')}}" val="{{ $data->smtp_username }}" required="true"
                        label="{{__('language.smtp_username')}}" />
                </div>
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="password" id="password"
                        place="{{__('language.enter_password')}}" val="{{ $data->smtp_password }}" required="true"
                        label="{{__('language.smtp_password')}}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="encryption" id="encryption"
                        place="{{__('language.enter_encryption')}}" val="{{ $data->smtp_encryption }}" required="true"
                        label="{{__('language.smtp_encryption')}}" />
                </div>
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="sender_email" id="sender_email"
                        place="{{__('language.enter_from_address')}}" val="{{ $data->smtp_email }}" required="true"
                        label="{{__('language.smtp_from_address')}}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="sender_name" id="sender_name"
                        place="{{__('language.enter_from_name')}}" val="{{ $data->smtp_sender_name }}" required="true"
                        label="{{__('language.smtp_from_name')}}" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                        btn-value="{{ __('language.update_smtp') }}" />
                </div>
            </div>

        </x-auth.form>
    </x-auth.card>
</x-settings>
