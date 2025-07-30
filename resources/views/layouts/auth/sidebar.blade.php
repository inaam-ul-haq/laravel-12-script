<nav id="sidebar" class="sidebar">
    <div class="sidebar-content">
        <div class="sidebar-user">
            <x-logo />
        </div>

        <ul class="sidebar-nav mt-3">
            @foreach ($sidebarmenus as $menu)
            @php
            $hasChildren = $menu->children && $menu->children->count();
            $isActive = Str::startsWith(request()->route()->getName(), $menu->route);
            $uniqueId = 'menuDropdown_' . $menu->id; // unique collapse id
            @endphp

            <li class="sidebar-item {{ $hasChildren ? '' : ($isActive ? 'active' : '') }}">
                @if ($hasChildren)
                <a data-bs-target="#{{ $uniqueId }}" data-bs-toggle="collapse"
                    class="sidebar-link {{ $isActive ? '' : 'collapsed' }}">
                    <i class="align-middle me-2 fas {{ $menu->icon }}"></i>
                    <span class="align-middle">{{ __($menu->name) }}</span>
                </a>

                <ul id="{{ $uniqueId }}" class="sidebar-dropdown list-unstyled collapse {{ $isActive ? 'show' : '' }}"
                    data-bs-parent="#sidebar">
                    @foreach ($menu->children as $child)
                    <li
                        class="sidebar-item {{ Str::startsWith(request()->route()->getName(), $child->route) ? 'active' : '' }}">
                        <a class="sidebar-link"
                            href="{{ $child->route ? route($child->route, $child->route_param) : '#' }}">
                            <i class="fas fa-angle-double-right me-2"></i>
                            {{ __($child->name) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @else
                <a class="sidebar-link" href="{{ $menu->route ? route($menu->route, $menu->route_param) : '#' }}">
                    <i class="align-middle me-2 fas {{ $menu->icon }}"></i>
                    <span class="align-middle">{{ __($menu->name) }}</span>
                </a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</nav>