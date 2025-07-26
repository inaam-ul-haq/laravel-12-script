<x-settings title="{{__('language.registration_title')}}" sub-title="{{__('language.registration_subtitle')}}">

    <x-auth.card card-header="{{__('language.registration_title')}}" header-button="true">
        <x-auth.form form-action="{{ route('settings.registeration_update') }}" enctype="true">
            @method('PUT')

            <div class="bg-light p-3 rounded-4">
                <div class="float-end">
                    <x-auth.input-checkbox margin-top="0" name="registration" id="registration" label=""
                        value="{{ $data['registration'] == 1 ? 1 : 0 }}" />
                </div>
                <label class="card-title h5" style="margin-bottom: 0px !important;"
                    for="registration">{{__('language.enable_registration')}}</label>
            </div>

            <div class="bg-light p-3 rounded-4 mt-3">
                <div class="float-end">
                    <x-auth.input-checkbox margin-top="0" name="boarding" id="boarding" label=""
                        value="{{ $data['on_boarding'] == 1 ? 1 : 0 }}" />
                </div>
                <label class="card-title h5" style="margin-bottom: 0px !important;"
                    for="boarding">{{__('language.enable_onboarding')}}</label>
            </div>

            <div class="row mt-3 float-end">
                <div class="col-md-12">
                    <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                        btn-value="{{ __('language.edit') }}" />
                </div>
            </div>
        </x-auth.form>
    </x-auth.card>
</x-settings>
