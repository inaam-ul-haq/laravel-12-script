<x-my-profile title="Change password" sub-title="Change your password with your old and new password">
    <x-auth.card card-header="Change Password" header-button="true">
        <x-auth.form form-action="{{ route('update_password') }}">

            <x-auth.input-field type="password" name="old_password" id="old_password" place="*********" val=""
                required="true" label="Old Password" />

            <x-auth.input-field type="password" name="new_password" id="new_password" place="*********" val=""
                required="true" label="New Password" />

            <x-auth.input-field type="password" name="new_password_confirmation" id="new_password_confirmation"
                place="*********" val="" required="true" label="Confirm New Password" />

            <x-auth.input-button btn-class="mt-3 btn-outline-primary" btn-value="Change Password" btn-type="submit" />

        </x-auth.form>
    </x-auth.card>
</x-my-profile>