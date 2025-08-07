<x-my-profile title="{{__('language.change_password')}}" sub-title="{{__('language.change_password_sub_title')}}">
    <x-auth.card card-header="{{__('language.change_password')}}" header-button="true">
        <x-auth.form form-action="{{ route('update_password') }}">

            <div class="mb-3">
                <x-auth.input-field type="password" name="old_password" id="old_password" place="*********" val=""
                    required="true" label="{{__('language.old_password_label')}}" />
            </div>

            <div class="mb-3">
                <x-auth.input-field type="password" name="new_password" id="new_password" place="*********" val=""
                    required="true" label="{{__('language.new_password_label')}}" />
            </div>

            <div class="mb-3">
                <x-auth.input-field type="password" name="new_password_confirmation" id="new_password_confirmation"
                    place="*********" val="" required="true" label="{{__('language.confirm_new_password_label')}}" />
            </div>

            <x-auth.input-button btn-class="btn-outline-primary" btn-value="{{__('language.change_password')}}"
                btn-type="submit" />

        </x-auth.form>
    </x-auth.card>
</x-my-profile>