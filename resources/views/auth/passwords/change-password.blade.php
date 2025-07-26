<x-my-profile title="{{__('language.confirm_password_label')}}"
    sub-title="{{__('language.confirm_password_sub_title')}}">
    <x-auth.card card-header="{{__('language.confirm_password_label')}}" header-button="true">
        <x-auth.form form-action="{{ route('update_password') }}">

            <x-auth.input-field type="password" name="old_password" id="old_password" place="*********" val=""
                required="true" label="{{__('language.old_password_label')}}" />

            <x-auth.input-field type="password" name="new_password" id="new_password" place="*********" val=""
                required="true" label="{{__('language.new_password_label')}}" />

            <x-auth.input-field type="password" name="new_password_confirmation" id="new_password_confirmation"
                place="*********" val="" required="true" label="{{__('language.confirm_new_password_label')}}" />

            <x-auth.input-button btn-class="mt-3 btn-outline-primary"
                btn-value="{{__('language.confirm_password_label')}}" btn-type="submit" />

        </x-auth.form>
    </x-auth.card>
</x-my-profile>
