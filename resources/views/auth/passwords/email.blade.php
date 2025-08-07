<x-layouts.login class="reset-password" page-title="{{__('language.reset_password')}}"
    sub-title="{{__('language.reset_password_sub_title')}}">

    @if (session('status'))
    <div class="alert alert-success p-3" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <x-auth.form form-action="{{ route('password.email') }}">
        <x-auth.input-field type="email" name="email" id="email" required="true"
            place="{{ __('language.email_placeholder') }}" val="" extraclasses=""
            label="{{__('language.email_label')}}" />

        <div class="d-grid mt-3 mb-3">
            <button class="btn-accoring-to-text btn btn-outline-primary col-6 mx-auto" type="submit"
                value="{{ __('language.send_reset_link') }}">{{ __('language.send_reset_link') }}</button>

        </div>
    </x-auth.form>
</x-layouts.login>