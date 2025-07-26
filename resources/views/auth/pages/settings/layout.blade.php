<x-layouts.auth page-title="{{ $title }}" sub-title="{{ $subTitle }}">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <x-auth.card card-body="p-0">
                <x-slot:card-header>
                    <i class="align-middle me-1 fas fa-fw fa-cogs"></i> {{__('language.site_configuration')}}
                    </x-slot>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'basic-info' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'basic-info') }}">
                            <i class="align-middle me-1 fas fa-fw fa-clipboard"></i> {{__('language.general_settings')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'smtp' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'smtp') }}">
                            <i class="align-middle me-1 fas fa-fw fa-envelope"></i> {{__('language.smtp_settings')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'social-logins' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'social-logins') }}">

                            <i class="align-middle me-1 fas fa-fw fa-sign-in-alt"></i> {{__('language.social_logins')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'payment-methods' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'payment-methods') }}">
                            <i class="align-middle me-1 fas fa-fw fa-credit-card"></i>
                            {{__('language.payment_methods')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'registration' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'registration') }}">
                            <i class="align-middle me-1 fas fa-fw fa-clipboard-list"></i>
                            {{__('language.registration_settings')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'languages' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'languages') }}">
                            <i class="align-middle me-1 fas fa-fw fa-language"></i>
                            {{__('language.languages')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'activation' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'activation') }}">
                            <i class="align-middle me-1 fas fa-fw fa-unlock"></i>
                            {{__('language.activation')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'upgrade' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'upgrade') }}">
                            <i class="align-middle me-1 fas fa-fw fa-cloud-upload-alt"></i>
                            {{__('language.upgrade')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'site-health' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'site-health') }}">
                            <i class="align-middle me-1 fas fa-fw fa-heartbeat"></i>
                            {{__('language.site_health')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->blade == 'cache' ? 'active' : '' }}"
                            href="{{ route('settings.index', 'cache') }}">
                            <i class="align-middle me-1 fas fa-fw fa-trash"></i>
                            {{__('language.cache')}}
                        </a>
                    </div>
            </x-auth.card>
        </div>

        <div class="col-md-8 col-xl-9">
            {{ $slot }}
        </div>
    </div>
</x-layouts.auth>
