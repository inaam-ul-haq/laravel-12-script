@include('layouts.guest.links')

{{-- @include('layouts.guest.top-bar') --}}
{{-- @include('layouts.guest.navigation') --}}

<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <x-auth.card>
                {{-- <h4 class="mb-1">{{ $pageTitle }}</h4>
                <p class="">{{ $subTitle }}</p> --}}

                <div class="text-center mb-3">
                    <x-logo />
                </div>

                {{ $slot }}

                @if ($setting->facebook_active || $setting->google_active || $setting->github_active ||
                $setting->twitter_active)
                <hr>
                <div class="d-flex justify-content-center">
                    <x-social-logins />
                </div>
                @endif
            </x-auth.card>
        </div>
    </div>
</div>

@include('layouts.guest.footer')

@include('layouts.guest.scripts')

@yield('scripts')

</body>

</html>
