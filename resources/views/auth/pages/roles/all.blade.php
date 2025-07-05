<x-layouts.auth>
    <x-slot name="pageTitle">All Roles</x-slot>

    <div class="row mt-3">
        <div class="col-md-12">
            <x-all-list title="Role List" :data="$data['all']">
                <x-slot name="headerCustom">
                    <x-auth.href-link link-href="{{ route('roles.create') }}" link-value="{{ __('Create New Role') }}"
                        link-class="btn btn-primary" />
                </x-slot>

                <x-auth.datatable>
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['all'] as $key => $role)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $role?->title }}</td>
                                <td>
                                    <x-auth.href-link link-href="{{ route('roles.show', $role->id) }}"
                                        link-value="Assign Permissions" />
                                </td>
                                @canany(['edit_role', 'delete_role'])
                                    <td class="text-center">
                                        <div class="d-inline-block dropdown">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">
                                                <i class="fas fa-ellipsis-v bg-light rounded p-2"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">

                                                @can('edit_role')
                                                    <a class="dropdown-item" href="{{ route('roles.edit', $role?->id) }}">
                                                        <i class="fas fa-edit me-2 text-warning"></i> Edit Role
                                                    </a>
                                                @endcan

                                                @can('delete_role')
                                                    <form action="{{ route('roles.destroy', $role?->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="fas fa-trash-alt me-2"></i> Delete Role
                                                        </button>
                                                    </form>
                                                @endcan

                                            </div>
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </x-auth.datatable>
            </x-all-list>
        </div>
    </div>
</x-layouts.auth>
