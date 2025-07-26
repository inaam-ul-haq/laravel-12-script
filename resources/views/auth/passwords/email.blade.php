<x-layouts.login page-title="{{__('language.verify_email')}}">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <x-auth.form form-action="{{ route('password.email') }}">
        <x-auth.input-field type="email" name="email" id="email" required="true"
            place="{{ __('language.email_placeholder') }}" val="" extraclasses="mb-3"
            label="{{__('language.email_label')}}" />

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 btn-outline-primary col-6 mx-auto" btn-type="submit"
                btn-value="{{ __('language.send_reset_link') }}" />
        </div>
    </x-auth.form>
</x-layouts.login>
