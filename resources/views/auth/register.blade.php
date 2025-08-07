<x-layouts.login page-title="{{__('language.sign_up')}}" sub-title="{{__('language.sign_up_sub_title')}}">

    <x-auth.form form-action="{{ route('register') }}">

        <div class="mb-3">
            <x-auth.input-field type="text" name="first_name" id="first_name" required="true"
                place="{{ __('language.first_name_placeholder') }}" val="" extraclasses=""
                label="{{ __('language.first_name_label') }}" />
        </div>

        <div class="mb-3">
            <x-auth.input-field type="text" name="last_name" id="last_name" required="true"
                place="{{ __('language.last_name_placeholder') }}" val="" extraclasses=""
                label="{{ __('language.last_name_label') }}" />
        </div>

        <div class="mb-3">
            <x-auth.input-field type="text" name="email" id="email" required="true"
                place="{{ __('language.email_placeholder') }}" val="" extraclasses=""
                label="{{ __('language.email_label') }}" />
        </div>

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password" id="password" required="true"
                    place="{{ __('language.password_placeholder') }}" val=""
                    label="{{ __('language.password_label') }}" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password_confirmation" id="password_confirmation"
                    required="true" place="{{ __('language.password_placeholder') }}" val=""
                    label="{{ __('language.confirm_password_label') }}" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input @error('terms_condition') is-invalid @enderror" type="checkbox" value="1"
                    name="terms_condition" id="terms_condition">
                <label class="form-check-label" for="terms_condition">
                    {{ __('language.agree_terms') }}
                    <x-auth.href-link link-href="#" link-value="{{ __('language.terms_of_use') }}" /> &
                    <x-auth.href-link link-href="#" link-value="{{ __('language.privacy_policy') }}" />
                </label>
            </div>
        </div>

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 btn-outline-primary col-4 mx-auto" btn-type="submit"
                btn-value="{{ __('language.create_account_button') }}" />
        </div>

    </x-auth.form>

    <div class="text-center ">
        <p class="mb-0">
            {{ __('language.already_have_account') }}
            <x-auth.href-link link-href="{{ route('login') }}" link-value="{{ __('language.sign_in') }}" />
        </p>
    </div>
</x-layouts.login>