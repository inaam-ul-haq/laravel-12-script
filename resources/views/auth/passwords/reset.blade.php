<x-layouts.login page-title="Reset Password">

    <x-auth.form form-action="{{ route('password.update') }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password" id="password" required="true" place="*****" val=""
                    label="Password" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password_confirmation" id="password_confirmation"
                    required="true" place="*****" val="" label="Confirm Password" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 btn-outline-primary" btn-type="submit"
                btn-value="{{ __('Reset Password') }}" />
        </div>
    </x-auth.form>
</x-layouts.login>
