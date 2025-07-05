<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="{{ route('welcome') }}" class="d-inline-flex link-body-emphasis text-decoration-none">
                <x-logo />
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('welcome') }}"
                    class="nav-link px-3 {{ Str::startsWith(request()->route()->getName(), 'welcome') ? 'active shadow-sm' : '' }}">Home</a>
            </li>
        </ul>
    </header>
</div>
