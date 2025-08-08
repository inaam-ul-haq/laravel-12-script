<x-layouts.auth>
    <x-slot name="pageTitle">{{__('language.category')}}</x-slot>

    <div class="row mt-3">
        @can('add_category')
        <div class="col-md-4">
            <x-auth.card
                card-header="{{ isset($data['category']) ? __('language.edit_category') : __('language.create_category') }}">
                @php
                if (isset($data['category'])) {
                $route = route('blog.category.update', $data['category']->id);
                } else {
                $route = route('blog.category.store');
                }
                @endphp
                <x-auth.form form-action="{{ $route }}" form-method="POST">

                    @if (isset($data['category']))
                    @method('PUT')
                    @endif

                    <div class="mb-3">
                        <x-category-list
                            category="{{ isset($data['category']) ? $data['category']->parent_id : '' }}" />
                    </div>

                    <div class="mb-3">
                        <x-auth.input-field type="text" name="name" id="name" required="true"
                            place="{{ __('language.category_title') }}"
                            val="{{ isset($data['category']) ? $data['category']->name : '' }}" extraclasses=""
                            label="{{ __('language.category_title') }}" />
                    </div>

                    <div class="mb-3">
                        <x-auth.input-field type="text" name="slug" id="slug" required="true"
                            place="{{ __('language.category_slug') }}"
                            val="{{ isset($data['category']) ? $data['category']->slug : '' }}" extraclasses=""
                            label="{{ __('language.category_slug') }}" />
                    </div>

                    @if (isset($data['category']))
                    <label for="is_active" class="form-label">Is Active</label>
                    <select name="is_active" id="is_active" class="form-select mb-3" required>
                        <option value="" disabled {{ $data['category']->is_active === null ? 'selected' : '' }}>
                            Select
                            Active or Archive
                        </option>
                        <option value="1" {{ $data['category']->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$data['category']->is_active ? 'selected' : '' }}>Archive</option>
                    </select>
                    @endif

                    <div class="col-12">
                        <x-auth.input-button btn-class="mb-3 btn-outline-primary col-3 mx-auto" btn-type="submit"
                            btn-value="{{ __('Submit') }}" />
                    </div>

                </x-auth.form>
            </x-auth.card>
        </div>
        @endcan

        @can('all_category')
        <div class="col-md-8">
            <x-all-list title="{{__('language.category_llist')}}" :data="$data['all']">

                <x-auth.datatable>
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>{{__('language.parent_name_label')}}</th>
                            <th>{{__('language.name')}}</th>
                            <th>{{__('language.active')}}</th>
                            <th>{{__('language.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['all'] as $key => $status)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-left">{{ $status?->parent?->name }}</td>
                            <td>{{ $status?->name }}</td>
                            <td class="text-center">{!! $status?->status_label !!}</td>

                            @canany(['edit_category', 'delete_category'])
                            <td class="text-center">
                                <div class="d-inline-block dropdown">
                                    <a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">
                                        <i class="fas fa-ellipsis-v bg-light rounded p-2"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        @can('edit_category')
                                        <a class="dropdown-item"
                                            href="{{ route('blog.category.index', $status?->id) }}">
                                            <i class="fas fa-edit me-2 text-warning"></i>
                                            {{__('language.edit_category')}}
                                        </a>
                                        @endcan

                                        @can('delete_category')
                                        <form action="{{ route('blog.category.destroy', $status?->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this status?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-trash-alt me-2"></i> {{__('language.delete_category')}}
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
        @endcan

    </div>
</x-layouts.auth>