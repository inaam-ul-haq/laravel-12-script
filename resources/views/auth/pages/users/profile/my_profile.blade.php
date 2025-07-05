<x-my-profile title="My Profile" sub-title="Complete detail about my profile">
    <x-auth.card card-header="My Profile" header-button="true">
        <x-auth.form form-action="{{ route('updatemyprofile') }}" enctype="true">
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="f_name" id="f_name" required="true"
                                place="{{ __('language.first_name_placeholder') }}"
                                val="{{ auth()->user()->first_name }}" extraclasses="mb-3"
                                label="{{ __('language.first_name_label') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="l_name" id="l_name" required="true"
                                place="{{ __('language.last_name_placeholder') }}" val="{{ auth()->user()->last_name }}"
                                extraclasses="mb-3" label="{{ __('language.last_name_label') }}" />
                        </div>

                        <div class="col-md-12">
                            <x-auth.input-field type="email" name="email" id="email" required="true"
                                place="{{ __('language.email_placeholder') }}" val="{{ auth()->user()->email }}"
                                extraclasses="mb-3 disabled" label="{{ __('language.email_label') }}" />
                        </div>

                        <div class="col-md-12">

                            <x-auth.text-area type="text" name="about" id="about" required="true"
                                place="{{ __('language.username_placeholder') }}" val="{{ auth()->user()->about }}"
                                extraclasses="mb-3" label="{{ __('language.biography_label') }}" />

                            <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                                btn-value="{{ __('Update My Profile') }}" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <x-auth.upload-file image="{{ auth()->user()->profile() }}" />
                </div>
            </div>
        </x-auth.form>
    </x-auth.card>
</x-my-profile>