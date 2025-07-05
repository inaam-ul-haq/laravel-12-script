@include('layouts.guest.links')

<main>
    @include('layouts.guest.top-bar')
    @include('layouts.guest.navigation')

    <div class="">
        {{ $slot }}
    </div>

    @include('layouts.guest.footer')
</main>

@include('layouts.guest.scripts')

@stack('scripts')

</body>

</html>
