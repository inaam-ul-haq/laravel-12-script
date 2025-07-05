<x-layouts.login page-title="{{ __('language.verify_account') }}">
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('language.resent') }}
    </div>
    @endif

    {{ __('language.check_email') }}
    {{ __('language.did_not_receive') }},

    <x-auth.form form-action="{{ route('verification.resend') }}">
        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 mt-3 btn-outline-primary col-5 mx-auto" btn-type="submit"
                btn-value="{{ __('language.click_to_resend') }}" />
        </div>
    </x-auth.form>
</x-layouts.login>