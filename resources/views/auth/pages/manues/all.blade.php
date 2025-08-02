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
                            <td>
                                @if ($menu->children->count() > 0)
                                <a href="#" data-id="{{ $menu->id }}" data-bs-toggle="modal"
                                    data-bs-target="#featureDetail">
                                    <i class="align-middle me-2 fas {{ $menu->icon }}"></i>
                                    <span class="align-middle">{{ __($menu?->name) }}</span>
                                </a>
                                @else
                                <i class="align-middle me-2 fas {{ $menu->icon }}"></i>
                                <span class="align-middle">{{ __($menu?->name) }}</span>
                                @endif

                            </td>
                            <td>{{ __($menu?->parent_name)}}</td>
                            <td>{{ __('language.assign_permission')}}</td>
                            <td class="mx-auto">
                                <div class="form-check form-switch">
                                    <input class="form-check-input menu-toggle"
                                        onchange="menuToggle(this, '{{ $menu->id }}')" type="checkbox" role="switch"
                                        {{ $menu->status ? 'checked' : '' }}>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </x-auth.datatable>
            </x-auth.card>
        </div>
    </div>

    <x-auth.modal modalId="featureDetail" modalTitle="{{__('language.feature_detail')}}">
        <div class="modal-body" id="featureDetailBody" style="min-height: 100px; position: relative;">
            <div id="featureDetailSpinner" style="display: none; text-align: center;">
                <div class="spinner-border text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </x-auth.modal>

    @push('auth_scripts')
    <script>
        $(document).on('click', '[data-bs-target="#featureDetail"]', function (e) {
            e.preventDefault();

            let $modalBody = $('#featureDetailBody');
            let $spinner = $('#featureDetailSpinner');
            let menuName = $(this).text().trim();
            let menuId = $(this).data('id');

            $modalBody.html('');
            $spinner.show();

            let url = '{{ route("menues.featureDetail", ":id") }}'.replace(':id', menuId);

            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    $spinner.hide();
                    $modalBody.html(response.data);
                },
                error: function (xhr) {
                    $spinner.hide();
                    let errorMessage = '{{ __('language.server_error') }}';
                    if (xhr.responseJSON?.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    $modalBody.html(`<div class="alert alert-danger">${errorMessage}</div>`);
                }
            });
        });

            function menuToggle(el, menuId) {
                let status = $(el).is(':checked') ? 1 : 0;

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

                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (xhr) {
                        console.log(xhr);

                        let errorMessage = "{{__('language.something_went_wrong') }}";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        toastr.error(errorMessage);

                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                });
            }
    </script>
    @endpush
</x-layouts.auth>