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

        <div class="row mb-4">
            @foreach ($data['banners']->take(3) as $banner)
            <div class="col-md-4 bg-info rounded shadow-sm p-4" style="background-image: url({{ $banner->image() }})">
                <h2 class="text-white">{{ $banner->title }}</h2>
                <p class="text-whtie">{{ $banner->description }}</p>
            </div>
            @endforeach

        </div>

        <div class="row g-4 mb-4">
            @foreach ($data['categories']->take(6) as $popular_category_item)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card text-center border-0 shadow-sm h-100 bg-light rounded p-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h6 class="card-title mb-0">{{ Str::limit($popular_category_item->name, 35) }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layouts.guest>