<x-layouts.auth>
    <x-slot name="pageTitle">Create New Staff</x-slot>
    <x-slot name="subTitle">Enter details for staff</x-slot>
    <x-auth.card card-header="Create New Staff" header-button="true">
        <x-auth.form form-action="{{ route('users.store') }}" enctype="true">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="f_name" id="f_name" required="true"
                                place="{{ __('language.first_name_placeholder') }}" val="" extraclasses="mb-3"
                                label="{{ __('language.first_name_label') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="l_name" id="l_name" required="true"
                                place="{{ __('language.last_name_placeholder') }}" val="" extraclasses="mb-3"
                                label="{{ __('language.last_name_label') }}" />
                        </div>

                        <div class="col-md-6">
                            <x-auth.input-field type="email" name="email" id="email" required="true"
                                place="{{ __('language.email_placeholder') }}" val="" extraclasses="mb-3 disabled"
                                label="{{ __('language.email_label') }}" />
                        </div>

                        <div class="col-md-6">
                            <x-role-list />
                        </div>

                        <div class="col-md-12">
                            <x-auth.text-area type="text" name="about" id="about" required="true"
                                place="{{ __('language.biography_staff_placeholder') }}" val="" extraclasses="mb-3"
                                label="{{ __('language.biography_staff_label') }}" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <x-auth.upload-file image="" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                        btn-value="{{ __('Create New User') }}" />
                </div>
            </div>

        </x-auth.form>
    </x-auth.card>
</x-layouts.auth>
