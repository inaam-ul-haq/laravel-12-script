<x-layouts.guest page-title="My Shop"
    page-description="🌟 Trendsetting Styles 💎 Budget-Friendly Luxury 🚚 Fast Shipping - Your Ultimate Fashion Destination!">

    <div class="container">
        <div class="row g-3">
            @include('layouts.guest.filter_sidebar')

            <div class="col-lg-9 order-lg-2" id="list_view_ajax">
                @include('layouts.guest.filter_products')
            </div>
        </div>
    </div>
</x-layouts.guest>