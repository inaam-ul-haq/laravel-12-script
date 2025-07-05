<x-layouts.login page-title="Confirm password">
    {{ __('Please confirm your password before continuing.') }}

    <x-auth.form form-action="{{ route('password.confirm') }}">
        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password" id="password" required="true" place="*****" val=""
                    label="Password" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 btn-outline-primary col-3 mx-auto" btn-type="submit"
                btn-value="{{ __('Confirm Password') }}" />
        </div>

        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </x-auth.form>
</x-layouts.login>