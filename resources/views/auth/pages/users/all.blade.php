<x-layouts.auth>
    <x-slot name="pageTitle">{{ \Str::title(str_replace('_', ' ', request()->user)) }} List</x-slot>

    <div class="row">
        <div class="col-md-12">
            <x-auth.card card-header="{{ \Str::title(str_replace('_', ' ', request()->user)) }} List">
                @can('add_user')
                <x-slot name="headerCustom">
                    <x-auth.href-link link-href="{{ route('users.create') }}" link-class="btn btn-primary"
                        link-value="{{ __('Create New Staff Member') }}" />
                </x-slot>
                @endcan

                <x-auth.datatable>
                    <thead class="border-top">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>

                            @if (request()->user == 'teacher')
                            <th>Assign Class</th>
                            @endif

                            @canany(['view_user', 'edit_user', 'delete_user'])
                            <th>Action</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['all'] as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user?->full_name }}</td>
                            <td>{{ $user?->email }}</td>

                            @if (request()->user == 'teacher')
                            <td>
                                <a href="{{ route('users.showAssignSectionForm', $user->id) }}" class=""
                                    title="Click here to assign class or section to this teacher"
                                    data-bs-toggle="tooltip" data-bs-placement="top">
                                    Assign Class
                                </a>
                            </td>
                            @endif

                            @canany(['view_user', 'edit_user', 'delete_user'])
                            <td class="text-center">
                                <div class="d-inline-block dropdown">
                                    <a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">
                                        <i class="fas fa-ellipsis-v bg-light rounded p-2"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        @if (auth()->user()->can('view_user'))
                                        <a class="dropdown-item" href="{{ route('users.show', $user?->id) }}">
                                            <i class="fas fa-eye me-2 text-primary"></i> View User
                                        </a>
                                        @endif

                                        @if (auth()->user()->can('edit_user'))
                                        <a class="dropdown-item" href="{{ route('users.edit', $user?->id) }}">
                                            <i class="fas fa-edit me-2 text-warning"></i> Edit User
                                        </a>
                                        @endif

                                        @if (auth()->user()->can('delete_user'))
                                        <form action="{{ route('users.destroy', $user?->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-trash-alt me-2"></i> Delete User
                                            </button>
                                        </form>
                                        @endif

                                    </div>
                                </div>
                            </td>
                            @endcanany
                        </tr>
                        @endforeach
                    </tbody>
                </x-auth.datatable>
            </x-auth.card>
        </div>
    </div>

</x-layouts.auth>
