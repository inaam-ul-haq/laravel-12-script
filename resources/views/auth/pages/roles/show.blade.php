<x-layouts.auth>
    <x-slot name="pageTitle">Role Detail</x-slot>
@push('auth_styles')
<style>
    .big-checkbox {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #007bff;
        background-color: #fff;
    }
    </style>
@endpush
    <div class="row mt-3">
        <div class="col-md-12">
            <x-auth.card card-header="Role Detail">
                <x-slot name="headerCustom">
                    @can('edit_role')
                    <x-auth.href-link link-href="{{ route('roles.edit', $data->id) }}"
                        link-value="{{ __('Edit Role Detail') }}" link-class="btn btn-primary" />
                    @endcan
                </x-slot>

                <x-auth.form form-action="{{ route('roles.assign_permission') }}">
                    <div class="row">
                        <div class="col-md-4">
                            {!! $data->role_title !!}
                        </div>

                        <h5 class="mt-3 card-title fs fw-semibold">Permission Assigned</h5>

                        <input type="hidden" name="role" value="{{ $data->id }}" />
                        @php
                            $groupedPermissions = $data->availablePermissions->groupBy('category');
                        @endphp
                        @foreach ($groupedPermissions as $category => $permissionGroup)
                            <div class="col-12 mt-3 mb-1">
                                <div class="border border-1 rounded-4 mb-3 p-3" style="background-color: #f8fafc;">
                                    <h6 class="fw-bold text-primary mb-3"><i class="fas fa-lock me-2"></i> {{ $category }}</h6>
                                    <div class="row">
                                        @foreach ($permissionGroup as $permissionTh)
                                            <div class="col-md-4 mb-2">
                                                <x-auth.input-checkbox name="permissions[{{ $permissionTh->id }}]"
                                                    id="{{ $permissionTh->id }}permission" :val="$permissionTh->id"
                                                    label="{{ $permissionTh->title }}"
                                                    extraclasses="big-checkbox"
                                                    :checked="in_array($permissionTh->id, $data->permissions->pluck('id')->toArray())" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <x-auth.input-button btn-class="mt-3 btn-primary" btn-value="Assign Permission"
                                btn-type="submit" />
                        </div>
                    </div>
                </x-auth.form>
            </x-auth.card>
        </div>
    </div>
</x-layouts.auth>
