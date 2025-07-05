<x-settings title="Email Configuration" sub-title="Update your SMTP details to send emails to your users">
    <x-auth.card card-header="SMTP Configuration" header-button="true">
        <x-auth.form form-action="{{ route('settings.smtp_update') }}" enctype="true">
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="host" id="host" place="Enter host"
                        val="{{ $data->smtp_host }}" required="true" label="Host" />
                </div>
                <div class="col-md-6">
                    <x-auth.input-field type="number" name="port" id="port" place="Enter name"
                        val="{{ $data->smtp_port }}" required="true" label="Port" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="username" id="username" place="Enter username"
                        val="{{ $data->smtp_username }}" required="true" label="Username" />
                </div>
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="password" id="password" place="Enter password"
                        val="{{ $data->smtp_password }}" required="true" label="Password" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="encryption" id="encryption" place="Enter encryption"
                        val="{{ $data->smtp_encryption }}" required="true" label="Encryption" />
                </div>
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="sender_email" id="sender_email" place="Enter sender_email"
                        val="{{ $data->smtp_email }}" required="true" label="Sender Email" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-auth.input-field type="text" name="sender_name" id="sender_name" place="Enter sender_name"
                        val="{{ $data->smtp_sender_name }}" required="true" label="Sender Name" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                        btn-value="{{ __('Update SMTP') }}" />
                </div>
            </div>

        </x-auth.form>
    </x-auth.card>
</x-settings>
