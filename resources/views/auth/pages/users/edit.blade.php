<x-layouts.auth page-title="{{__('language.user_edit_title')}}">

    <x-auth.card card-header="{{__('language.my_profile')}}" header-button="true">
        <x-auth.form form-action="{{ route('users.update', $data?->id) }}" enctype="true">
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="f_name" id="f_name" required="true"
                                place="{{ __('language.first_name_placeholder') }}" val="{{ $data?->first_name }}"
                                extraclasses="mb-3" label="{{ __('language.first_name_label') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="l_name" id="l_name" required="true"
                                place="{{ __('language.last_name_placeholder') }}" val="{{ $data?->last_name }}"
                                extraclasses="mb-3" label="{{ __('language.last_name_label') }}" />
                        </div>

                        <div class="col-md-12">
                            <x-auth.input-field type="email" name="email" id="email" required="true"
                                place="{{ __('language.email_placeholder') }}" val="{{ $data?->email }}"
                                extraclasses="mb-3 disabled" label="{{ __('language.email_label') }}" />
                        </div>

                        <div class="col-md-12">

                            <x-auth.text-area type="text" name="about" id="about" required="true"
                                place="{{ __('language.username_placeholder') }}" val="{{ $data?->about }}"
                                extraclasses="mb-3" label="{{ __('language.biography_label') }}" />

                            <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                                btn-value="{{ __('language.edit') }}" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <x-auth.upload-file image="{{ $data?->profile() }}" />
                </div>
            </div>
        </x-auth.form>
    </x-auth.card>
</x-layouts.auth>
