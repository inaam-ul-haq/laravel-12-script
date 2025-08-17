<x-layouts.auth>
    <x-slot name="pageTitle">{{ __('language.post_detail') }}</x-slot>

    <x-auth.card card-header="{{ __('language.post_detail') }}">
        <div class="post-detail">

            {{-- Title --}}
            <h2 class="mb-3 fw-bold text-primary">{{ $data?->title }}</h2>

            {{-- Meta Info --}}
            <div class="d-flex align-items-center text-muted mb-3 small">
                <span class="me-3">
                    <i class="bi bi-person-circle"></i>
                    {{ $data?->author?->full_name ?? __('language.unknown_author') }}
                </span>
                <span class="me-3">
                    <i class="bi bi-calendar-event"></i>
                    {{ $data?->published }}
                </span>
                <span>
                    <i class="bi bi-eye"></i> {{ $data?->view_count ?? 0 }} {{ __('language.views') }}
                </span>
            </div>

            {{-- Featured Image --}}
            @if($data?->fileUrl('image'))
            <div class="mb-4 text-center">
                <img src="{{ $data->fileUrl('image') }}" alt="{{ $data->title }}" class="img-fluid rounded shadow-sm">
            </div>
            @endif

            {{-- Short Summary --}}
            @if($data?->short_summary)
            <p class="lead text-secondary">
                {!! $data->short_summary !!}
            </p>
            @endif

            <hr class="my-4">

            {{-- Content --}}
            <div class="post-content fs-6 lh-lg">
                {!! $data?->content !!}
            </div>

        </div>
    </x-auth.card>
</x-layouts.auth>