<x-auth.datatable :search="false">
    <thead class="">
        <tr>
            <th>{{__('language.name')}}</th>
            <th>{{__('language.permissions')}}</th>
            <th>{{__('language.action')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $menu)
        <tr>
            <td>
                <i class="align-middle me-2 fas {{ $menu->icon }}"></i>
                <span class="align-middle">{{ __($menu?->name) }}</span>
            </td>
            <td>{{ __('language.assign_permission')}}</td>
            <td class="mx-auto">
                <div class="form-check form-switch">
                    <input class="form-check-input menu-toggle" onchange="menuToggle(this, '{{ $menu->id }}')"
                        type="checkbox" data-id="{{ $menu->id }}" role="switch" {{ $menu->status ? 'checked' : '' }}>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</x-auth.datatable>