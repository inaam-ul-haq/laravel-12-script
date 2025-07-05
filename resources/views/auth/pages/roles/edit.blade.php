<x-layouts.auth>
    <x-slot name="pageTitle">Edit {{$data->title}}</x-slot>
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
            <x-auth.card card-header="Edit {{$data->title}}">
                <x-auth.form form-action="{{ route('roles.update', $data->id) }}">
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4">
                            <x-auth.input-field type="text" name="title" id="title" place="Enter title"
                                val="{{ $data->title }}" required="true" label="Role Title" />
                        </div>

                        <div class="col-md-4">
                            <x-auth.input-field type="color" name="color" id="color" val="{{ $data->color }}"
                                required="true" label="Pick Color" place="Select role background color" required="true"
                                extraclasses="rounded-full w-12 h-12 p-0 border-none shadow cursor-pointer" />
                        </div>

                        <h5 class="mt-3 card-title fs fw-semibold">Pick the permissions you'd like to assign to this
                            role in the next step</h5>

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
                                                    :checked="in_array($permissionTh->id, $data->availablePermissions->pluck('id')->toArray())" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <x-auth.input-button btn-class="mt-3 btn-primary" btn-value="Update Role"
                                btn-type="submit" />
                        </div>
                    </div>
                </x-auth.form>
            </x-auth.card>
        </div>
    </div>
</x-layouts.auth>
