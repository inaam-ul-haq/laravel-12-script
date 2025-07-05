<x-auth.card card-header="{{ $title }}">
    @if (isset($headerCustom))
        <x-slot name="headerCustom">
            {{ $headerCustom }}
        </x-slot>
    @endif

    {{ $slot }}

    {{ $allData->links('vendor.pagination.bootstrap-5') }}

</x-auth.card>
