<x-layouts.login page-title="{{__('language.welcometo')}} {{ config('app.name') }}! 👋"
    sub-title="{{__('language.welcome_sub_title')}}">

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