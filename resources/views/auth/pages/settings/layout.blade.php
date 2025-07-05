<x-layouts.auth page-title="{{ $title }}" sub-title="{{ $subTitle }}">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <x-auth.card card-body="p-0">
                <x-slot:card-header>
                    <i class="align-middle me-1 fas fa-fw fa-cogs"></i> Site Configuration
                </x-slot>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'basic-info' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'basic-info') }}">
                        <i class="align-middle me-1 fas fa-fw fa-clipboard"></i> General
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'smtp' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'smtp') }}">
                        <i class="align-middle me-1 fas fa-fw fa-envelope"></i> SMTP
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'social-logins' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'social-logins') }}">

                        <i class="align-middle me-1 fas fa-fw fa-sign-in-alt"></i> Social Logins
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'payment-methods' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'payment-methods') }}">
                        <i class="align-middle me-1 fas fa-fw fa-credit-card"></i>
                        Payment Methods
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'registration' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'registration') }}">
                        <i class="align-middle me-1 fas fa-fw fa-clipboard-list"></i>
                        Registration
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'languages' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'languages') }}">
                        <i class="align-middle me-1 fas fa-fw fa-language"></i>
                        Languages
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'activation' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'activation') }}">
                        <i class="align-middle me-1 fas fa-fw fa-unlock"></i>
                        Activation
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'upgrade' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'upgrade') }}">
                        <i class="align-middle me-1 fas fa-fw fa-cloud-upload-alt"></i>
                        Upgrade Software
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'site-health' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'site-health') }}">
                        <i class="align-middle me-1 fas fa-fw fa-heartbeat"></i>
                        Site Health
                    </a>
                    <a class="list-group-item list-group-item-action {{ request()->blade == 'cache' ? 'active' : '' }}"
                        href="{{ route('settings.index', 'cache') }}">
                        <i class="align-middle me-1 fas fa-fw fa-trash"></i>
                        Clear Cache
                    </a>
                </div>
            </x-auth.card>
        </div>

        <div class="col-md-8 col-xl-9">
            {{ $slot }}
        </div>
    </div>
</x-layouts.auth>
