@include('layouts.guest.links')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-12">
            <x-auth.card card="shadow-lg rounded-4 p-3">
                <div class="text-center mb-2-8">
                    <x-logo />
                </div>

                <h2 class="fw-semibold mb-1 text-primary title-space">{{ $pageTitle }}</h2>
                <p class="title-space">{{ $subTitle }}</p>

                {{ $slot }}

                @if ($setting->facebook_active || $setting->google_active || $setting->github_active ||
                $setting->twitter_active)
                <div class="my-4 text-center position-relative">
                    <hr class="my-3">
                    <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 small text-muted">or
                        continue with</span>
                </div>
                <div class="d-flex justify-content-center gap-3">
                    <x-social-logins />
                </div>
                @endif
            </x-auth.card>

            <div class="text-center mt-4 small text-muted">
                Copyright &copy;
                {{ date('Y') }} Designed & Developed by <a href="{{config('app.developer.url')}}" target="_blank"
                    class="text-muted">{{config('app.developer.name')}}</a>
            </div>
        </div>
    </div>
</div>

@include('layouts.guest.footer')

@include('layouts.guest.scripts')

@yield('scripts')

</body>

</html>