@php
$pageTitle = "$errorcode";
@endphp

@include('layouts.auth.links')

<main class="main h-100 w-100">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center">
                        <h1 class="display-1 fw-bold">{{ $errorcode }}</h1>
                        <p class="h2 fw-normal mt-3 mb-4">{{ $message }}</p>
                        <a href="{{ route('auth') }}" class="btn btn-primary btn-lg">Return to website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.auth.scripts')