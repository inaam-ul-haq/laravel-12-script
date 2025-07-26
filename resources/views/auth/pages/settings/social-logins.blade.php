<x-settings title="{{__('language.social_logins_title')}}" sub-title="{{__('language.social_logins_subtitle')}}">
    <x-auth.form form-action="{{ route('settings.social_logins_update') }}" enctype="true">
        @method('PUT')

        <x-auth.card card-header="{{ __('language.social_logins_title') }}" header-button="true">
            {{-- Facebook --}}
            <div class="accordion border border-1 rounded-4" id="facebook">
                <div class="bg-light p-2 rounded-4" for="factivate">
                    <div class="float-end">
                        <x-auth.input-checkbox data-bs-toggle="collapse" data-bs-target="#facebookAcording"
                            aria-expanded="true" aria-controls="facebookAcording" margin-top="0" name="factivate"
                            id="factivate" label="" value="{{ $data['facebook_active'] == 1 ? 1 : 0 }}" />
                    </div>
                    <h5 class="card-title" style="margin-bottom: 0px !important;"><i
                            class="align-middle fab my-1 fa-facebook"></i> {{ __('language.facebook') }}</h5>
                </div>

                <div id="facebookAcording" class="collapse {{ $data['facebook_active'] == 1 ? 'show' : '' }} p-2"
                    aria-labelledby="headingOne" data-bs-parent="facebook">
                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="fapi" id="fapi" place="{{ __('language.enter_api') }}"
                                val="{{ $data->facebook_api_key }}" required=""
                                label="{{ __('language.facebook_api_key') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="fsecret" id="fsecret"
                                place="{{ __('language.enter_secret') }}" val="{{ $data->facebook_api_secret }}"
                                required="" label="{{ __('language.facebook_secret_key') }}" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="furl" id="furl" place="{{ __('language.enter_url') }}"
                                val="{{ $data->facebook_redirect_url }}" required=""
                                label="{{ __('language.facebook_redirect_url') }}" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Github --}}
            <div class="accordion border border-1 rounded-4 mt-3" id="github">
                <div class="bg-light p-2 rounded-4">
                    <div class="float-end">
                        <x-auth.input-checkbox data-bs-toggle="collapse" data-bs-target="#githubAourding"
                            aria-expanded="true" aria-controls="githubAourding" margin-top="0" name="gitactivate"
                            id="gitactivate" label="" value="{{ $data['github_active'] == 1 ? 1 : 0 }}" />
                    </div>
                    <h5 class="card-title" style="margin-bottom: 0px !important;"><i
                            class="align-middle fab my-1 fa-github"></i> {{ __('language.github') }}</h5>
                </div>

                <div id="githubAourding"
                    class="collapse {{ $errors->has('gitapi') || $errors->has('gitsecret') || $errors->has('giturl') || old('gitactivate') ? 'show' : ($data['github_active'] == 1 ? 'show' : '') }} p-2"
                    aria-labelledby="githubAourding" data-bs-parent="github">
                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="gitapi" id="gitapi"
                                place="{{ __('language.enter_api') }}" val="{{ $data->github_api_key }}" required=""
                                label="{{ __('language.github_api_key') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="gitsecret" id="gitsecret"
                                place="{{ __('language.enter_secret') }}" val="{{ $data->github_api_secret }}"
                                required="" label="{{ __('language.github_secret_key') }}" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="giturl" id="giturl"
                                place="{{ __('language.enter_url') }}" val="{{ $data->github_redirect_url }}"
                                required="" label="{{ __('language.github_redirect_url') }}" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Google --}}
            <div class="accordion border border-1 rounded-4 mt-3" id="google">
                <div class="bg-light p-2 rounded-4">
                    <div class="float-end">
                        <x-auth.input-checkbox data-bs-toggle="collapse" data-bs-target="#googleAourding"
                            aria-expanded="true" aria-controls="googleAourding" margin-top="0" name="gactivate"
                            id="gactivate" label="" value="{{ $data['google_active'] == 1 ? 1 : 0 }}" />
                    </div>
                    <h5 class="card-title" style="margin-bottom: 0px !important;"><i
                            class="align-middle fab my-1 fa-google"></i> {{ __('language.google') }}</h5>
                </div>

                <div id="googleAourding"
                    class="collapse  {{ $errors->has('gapi') || $errors->has('gsecret') || $errors->has('gurl') || old('gactivate') ? 'show' : ($data['google_active'] == 1 ? 'show' : '') }} p-2"
                    aria-labelledby="googleAourding" data-bs-parent="google">

                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="gapi" id="gapi" place="{{ __('language.enter_api') }}"
                                val="{{ $data->google_api_key }}" required=""
                                label="{{ __('language.google_api_key') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="gsecret" id="gsecret"
                                place="{{ __('language.enter_secret') }}" val="{{ $data->google_api_secret }}"
                                required="" label="{{ __('language.google_secret_key') }}" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="gurl" id="gurl" place="{{ __('language.enter_url') }}"
                                val="{{ $data->google_redirect_url }}" required=""
                                label="{{ __('language.google_redirect_url') }}" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Twitter --}}
            <div class="accordion border border-1 rounded-4 mt-3" id="twitter">
                <div class="bg-light p-2 rounded-4">
                    <div class="float-end">
                        <x-auth.input-checkbox data-bs-toggle="collapse" data-bs-target="#twitterAourding"
                            aria-expanded="true" aria-controls="twitterAourding" margin-top="0" name="tactivate"
                            id="tactivate" label="" value="{{ $data['twitter_active'] == 1 ? 1 : 0 }}" />
                    </div>
                    <h5 class="card-title" style="margin-bottom: 0px !important;"><i
                            class="align-middle fab my-1 fa-twitter"></i> {{ __('language.twitter') }}</h5>
                </div>

                <div id="twitterAourding"
                    class="collapse  {{ $errors->has('tapi') || $errors->has('tsecret') || $errors->has('turl') || old('tactivate') ? 'show' : ($data['twitter_active'] == 1 ? 'show' : '') }} p-2"
                    aria-labelledby="twitterAourding" data-bs-parent="twitter">

                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="tapi" id="tapi" place="{{ __('language.enter_api') }}"
                                val="{{ $data->twitter_api_key }}" required=""
                                label="{{ __('language.twitter_api_key') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="tsecret" id="tsecret"
                                place="{{ __('language.enter_secret') }}" val="{{ $data->twitter_api_secret }}"
                                required="" label="{{ __('language.twitter_secret_key') }}" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="turl" id="turl" place="{{ __('language.enter_url') }}"
                                val="{{ $data->twitter_redirect_url }}" required=""
                                label="{{ __('language.twitter_redirect_url') }}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 float-end">
                <div class="col-md-12">
                    <x-auth.input-button btn-class="btn-primary" btn-type="submit"
                        btn-value="{{ __('language.update_social_logins') }}" />
                </div>
            </div>
        </x-auth.card>
    </x-auth.form>
</x-settings>
