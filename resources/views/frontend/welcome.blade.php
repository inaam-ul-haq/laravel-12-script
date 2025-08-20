<x-layouts.guest page-title="">

    <div class="container">
        <div class="custom-background row rounded mb-4 shadow-sm">
            <div class="col-md-6 d-flex justify-content-center flex-column ps-5">
                <h2>Welcome to {{ config('app.name') }}</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <a href="http://" class="btn btn-dark btn-sm col-3">Shop Now</a>
            </div>
            <div class="col-md-6 d-flex align-items-end justify-content-center">
                <img src="{{ asset('assets/img/card-advance-sale.png') }}" alt="" srcset="" style="min-width: 17rem;">
            </div>
        </div>
    </div>
</x-layouts.guest>