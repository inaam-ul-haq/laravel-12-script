<x-layouts.auth page-title="{{ $title }}" sub-title="{{ $subTitle }}">
    <x-slot name="pageTitle">
        {{ $title }}</x-slot>
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <x-auth.card card-body="p-0">
                <x-slot:card-header>
                    <i class="align-middle me-1 fas fa-fw fa-user-edit"></i> {{__('language.profile_settings')}}
                    </x-slot>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action {{ request()->route()->getName() == 'myprofile' ? 'active' : '' }}"
                            href="{{ route('myprofile') }}">
                            <i class="align-middle me-1 fas fa-fw fa-id-card"></i> {{__('language.account')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->route()->getName() == 'change_password' ? 'active' : '' }}"
                            href="{{ route('change_password') }}">
                            <i class="align-middle me-1 fas fa-fw fa-lock"></i> {{__('language.change_password')}}
                        </a>
                        <a class="list-group-item list-group-item-action {{ request()->route()->getName() == 'safety_privacy' ? 'active' : '' }}"
                            href="{{ route('safety_privacy') }}">
                            <i class="align-mid dle me-1 fas fa-fw fa-shield-alt"></i> {{__('language.safety_privacy')}}
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="align-middle me-1 fas fa-fw fa-bell"></i>
                            {{__('language.email_notification_label')}}
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="align-middle me-1 fas fa-fw fa-broadcast-tower"></i>
                            {{__('language.web_notification_label')}}
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="align-middle me-1 fas fa-fw fa-trash"></i> {{__('language.delete_account_label')}}
                        </a>
                    </div>
            </x-auth.card>
        </div>

        <div class="col-md-8 col-xl-9">
            {{ $slot }}
        </div>
    </div>
</x-layouts.auth>
