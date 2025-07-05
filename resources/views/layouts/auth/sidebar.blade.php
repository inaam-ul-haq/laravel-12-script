<nav id="sidebar" class="sidebar">
    <div class="sidebar-content">
        <div class="sidebar-user">
            <x-logo />
        </div>

        <ul class="sidebar-nav mt-3">

            {{-- SUPER ADMIN DASHBOARD --}}
            <li class="sidebar-header">Main</li>
            <li class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'auth') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('auth') }}">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i>
                    <span class="align-middle">{{ __('language.dashboard') }}</span>
                </a>
            </li>

            {{-- CORE MANAGEMENT --}}
            <li class="sidebar-header">Core Management</li>

            {{-- STAFF MANAGEMENT --}}
            @can('all_user')
            <li class="sidebar-item">
                <a data-bs-target="#usersDropdown" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-file-invoice-dollar"></i>
                    <span class="align-middle">{{ __('language.staff_management') }}</span>
                </a>
                <ul id="usersDropdown"
                    class="sidebar-dropdown list-unstyled collapse {{ Str::startsWith(request()->route()->getName(), 'users.') ? 'show' : '' }}"
                    data-bs-parent="#sidebar">

                    @can('all_user')
                    @foreach ($roles as $roleKey => $role)
                    <li class="sidebar-item {{ request()->user == $roleKey ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('users.index', $roleKey) }}">
                            <i class="fas fa-angle-double-right me-2"></i> {{ $role }}
                        </a>
                    </li>
                    @endforeach
                    @endcan
                </ul>
            </li>
            @endcan

            {{-- SYSTEM SETTINGS (Dropdown) --}}
            @canany(['all_role', 'site_setting'])
            <li class="sidebar-header">System Settings</li>
            <li class="sidebar-item">
                <a data-bs-target="#settingsCollapse" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-cogs"></i>
                    <span class="align-middle">{{ __('language.configuration') }}</span>
                </a>
                <ul id="settingsCollapse"
                    class="sidebar-dropdown list-unstyled collapse {{ Str::startsWith(request()->route()->getName(), 'roles.') || Str::startsWith(request()->route()->getName(), 'settings.') || Str::startsWith(request()->route()->getName(), 'tags.') || Str::startsWith(request()->route()->getName(), 'systemstatuses.') ? 'show' : '' }}"
                    data-bs-parent="#sidebar">
                    @can('all_role')
                    <li
                        class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'roles.') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('roles.index') }}">
                            <i class="fas fa-angle-double-right me-2"></i> {{ __('language.role_permission') }}
                        </a>
                    </li>
                    @endcan

                    @can('site_setting')
                    <li
                        class="sidebar-item {{ Str::startsWith(request()->route()->getName(), 'settings.') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('settings.index', 'basic-info') }}">
                            <i class="fas fa-angle-double-right me-2"></i> {{ __('language.site_configuration') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            {{--  --}}
            <li class="sidebar-item {{ request()->is('messages*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('messages.seen') }}">
                    <i class="align-middle me-2 fas fa-comments"></i>
                    <span class="align-middle">Communication</span>
                </a>
            </li>
            {{-- USER ACCOUNT --}}
            <li class="sidebar-header">Account</li>
            <li
                class="sidebar-item {{ in_array(request()->route()->getName(), ['change_password', 'myprofile', 'safety_privacy']) ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('change_password') }}">
                    <i class="align-middle me-2 fas fa-user-cog"></i>
                    <span class="align-middle">{{ __('language.settings') }}</span>
                </a>
            </li>



        </ul>
    </div>
</nav>
