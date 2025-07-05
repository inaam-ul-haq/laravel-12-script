@if ($setting->facebook_active)
<x-auth.href-link link-href="{{ route('social.redirect', 'facebook') }}" link-value=""
    link-class="btn btn-icon rounded-pill btn-text-facebook">
    <i class="fab fa-facebook"></i>
</x-auth.href-link>
@endif

@if ($setting->google_active)
<x-auth.href-link link-href="{{ route('social.redirect', 'google') }}" link-value="Google"
    link-class="btn btn-icon rounded-pill btn-text-google-plus">
    <i class="fab fa-google"></i>
</x-auth.href-link>
@endif

@if ($setting->github_active)
<x-auth.href-link link-href="{{ route('social.redirect', 'github') }}" link-value="Github"
    link-class="btn btn-icon rounded-pill btn-text-github">
    <i class="fab fa-github"></i>
</x-auth.href-link>
@endif

@if ($setting->twitter_active)
<x-auth.href-link link-href="{{ route('social.redirect', 'twitter') }}" link-value="Twitter"
    link-class="btn btn-icon rounded-pill btn-text-twitter">
    <i class="fab fa-twitter"></i>
</x-auth.href-link>
@endif
