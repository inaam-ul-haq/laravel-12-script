<x-settings title="Registration setup" sub-title="Activate of deactivate registration features for new users">

    <x-auth.card card-header="Registration setup" header-button="true">
        <x-auth.form form-action="{{ route('settings.registeration_update') }}" enctype="true">
            @method('PUT')

            <div class="bg-light p-3 rounded-4">
                <div class="float-end">
                    <x-auth.input-checkbox margin-top="0" name="registration" id="registration" label=""
                        value="{{ $data['registration'] == 1 ? 1 : 0 }}" />
                </div>
                <label class="card-title h5" style="margin-bottom: 0px !important;" for="registration">Enable
                    Registration</label>
            </div>

            {{-- <div class="bg-light p-3 rounded-4 mt-3">
                <div class="float-end">
                    <x-auth.input-checkbox margin-top="0" name="boarding" id="boarding" label=""
                        value="{{ $data['on_boarding'] == 1 ? 1 : 0 }}" />
            </div>
            <label class="card-title h5" style="margin-bottom: 0px !important;" for="boarding">Enable User
                On-Boarding</label>
            </div> --}}

            <div class="row mt-3 float-end">
                <div class="col-md-12">
                    <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                        btn-value="{{ __('Update Registration') }}" />
                </div>
            </div>
        </x-auth.form>
    </x-auth.card>
</x-settings>