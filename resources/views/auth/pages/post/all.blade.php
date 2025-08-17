<x-layouts.auth>
    <x-slot name="pageTitle">{{__('language.post')}}</x-slot>

    <x-auth.card card-header="{{__('language.list')}}">
        @can('add_post')
        <x-slot name="headerCustom">
            <x-auth.href-link link-href="{{ route('blog.post.create') }}" link-class="btn btn-primary"
                link-value="{{ __('language.create_post') }}" />
        </x-slot>
        @endcan

        <x-auth.datatable>
            <thead class="border-top">
                <tr>
                    <th>{{__('language.id')}}</th>
                    <th>{{__('language.title')}}</th>
                    <th>{{__('language.short_description_title')}}</th>
                    <th>{{__('language.status')}}</th>
                    @canany(['view_post', 'edit_post', 'delete_post'])
                    <th>{{__('language.action')}}</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach ($data['all'] as $key => $post)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $post?->title }}</td>
                    <td>{!! $post?->short_description !!}</td>
                    <td>{{ $post?->status }}</td>

                    @canany(['view_post', 'edit_post', 'delete_post'])
                    <td class="text-center">
                        <div class="d-inline-block dropdown">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="fas fa-ellipsis-v bg-light rounded p-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                @if (auth()->user()->can('view_post'))
                                <a class="dropdown-item" href="{{ route('blog.post.show', $post?->id) }}">
                                    <i class="fas fa-eye me-2 text-primary"></i> {{__('language.view')}}
                                </a>
                                @endif

                                @if (auth()->user()->can('edit_post'))
                                <a class="dropdown-item" href="{{ route('blog.post.edit', $post?->id) }}">
                                    <i class="fas fa-edit me-2 text-warning"></i> {{__('language.edit')}}
                                </a>
                                @endif

                                @if (auth()->user()->can('delete_post'))
                                <form action="{{ route('blog.post.destroy', $post?->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-trash-alt me-2"></i> {{__('language.delete')}}
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


</x-layouts.auth>