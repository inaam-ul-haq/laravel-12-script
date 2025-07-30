<x-layouts.auth>
    <x-slot name="pageTitle">{{__('language.sidebar_menu_list')}}</x-slot>

    <div class="row">
        <div class="col-md-12">
            <x-auth.card card-header="{{__('language.sidebar_menu_list')}}">

                <x-auth.datatable :search="false">
                    <thead class="">
                        <tr>
                            <th>{{__('language.name')}}</th>
                            <th>{{__('language.parent_name_label')}}</th>
                            <th>{{__('language.permissions')}}</th>
                            <th>{{__('language.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['all'] as $key => $menu)
                        <tr>
                            <td>{{ __($menu?->name)}}</td>
                            <td>{{ __($menu?->parent_name)}}</td>
                            <td>{{ __('language.assign_permission')}}</td>
                            <td class="mx-auto">
                                <div class="form-check form-switch">
                                    <input class="form-check-input menu-toggle" type="checkbox"
                                        data-id="{{ $menu->id }}" role="switch" {{ $menu->status ? 'checked' : '' }}>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </x-auth.datatable>
            </x-auth.card>
        </div>
    </div>

    @push('auth_scripts')
    <script>
        $(document).ready(function () {
            $('.menu-toggle').change(function () {
                let menuId = $(this).data('id');
                let status = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route("menues.store") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        menu_id: menuId,
                        status: status
                    },
                    success: function (response) {
                        toastr.success(response.message);
                    },
                    error: function (xhr) {
                        toastr.error('Something went wrong!');
                    }
                });
            });
        });
    </script>
    @endpush
</x-layouts.auth>