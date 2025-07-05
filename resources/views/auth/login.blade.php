<x-layouts.login page-title="Welcome to {{ config('app.name') }}! 👋"
    sub-title="Please sign-in to your account and start the adventure">

    <x-auth.form form-action="{{ route('login') }}">

        <x-auth.input-field type="email" name="email" id="email" required="true"
            place="{{ __('language.email_placeholder') }}" val="" extraclasses="mb-3"
            label="{{ __('language.email_label') }}" />

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password" id="password" required="true"
                    place="{{ __('language.password_placeholder') }}" val=""
                    label="{{ __('language.password_label') }}" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="my-4">
            <div class="form-check">
                <input class="form-check-input @error('terms_condition') is-invalid @enderror" type="checkbox" value="1"
                    required name="terms_condition" id="terms_condition">
                <label class="form-check-label" for="terms_condition">
                    {{ __('language.agree_terms') }}
                    <x-auth.href-link link-href="#" link-value="{{ __('language.terms_of_use') }}" /> &
                    <x-auth.href-link link-href="#" link-value="{{ __('language.privacy_policy') }}" />
                </label>
            </div>
        </div>

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 btn-outline-primary col-3 mx-auto" btn-type="submit"
                btn-value="{{ __('language.login_button') }}" />
        </div>
    </x-auth.form>

    @if (Route::has('register'))
    <div class="text-center ">
        <p class="mb-0">
            {{ __('language.dont_have_account') }}
            <x-auth.href-link link-href="{{ route('register') }}" link-value="{{ __('language.sign_up') }}" />
        </p>
    </div>
    @endif

    @if (Route::has('password.request'))
    <div class="text-center mt-3">
        <x-auth.href-link link-href="{{ route('password.request') }}"
            link-value="{{ __('language.forgot_password') }}" />
    </div>
    @endif

</x-layouts.login>