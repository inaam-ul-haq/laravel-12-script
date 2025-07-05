<x-layouts.guest page-title="Product Detail">
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="{{ $data['product']->mainImage() }}" alt="Product" class="rounded mb-3 img-thumbnail"
                    id="mainImage">
                <div class="gap-3">
                    @foreach ($data['product']->gallary() as $images)
                    <img src="{{ $images }}" alt="Thumbnail 1" class="thumbnail rounded active"
                        onclick="changeImage(event, this.src)">
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="mb-3">{{ $data['product']->title }}</h2>
                <div class="mb-3">
                    <span class="h4 me-2">{{ $data['product']->price }}</span>
                    <span class="text-muted"><s>{{ $data['product']->compare_price }}</s></span>
                </div>
                <div class="mb-3">
                    {!! $data['product']->review_star !!}

                    <span class="ms-2">{{ $data['product']->avg_review }} (<a href="javascript:void(0)"
                            data-bs-target="#pills-reviews">{{ $data['product']->review_count }}
                            reviews</a>)</span>
                </div>

                <div class="mb-4">{!! $data['product']->short_description !!}</div>

                @php
                $uniquePivots = $data['product']->variants
                ->flatMap(fn($v) => $v->variantAttributes)
                ->unique(fn($pivot) => $pivot->attributeValue->id);

                $groupedByType = $uniquePivots->groupBy(fn($pivot) => $pivot->attributeValue->attribute->name);
                @endphp

                <ul class="list-unstyled">
                    @foreach($groupedByType as $type => $pivots)
                    <li class="mb-3">
                        <strong class="d-block text-uppercase mb-1">{{ str_replace('_', ' ', $type) }}</strong>

                        <div class="d-flex flex-wrap align-items-center gap-3">
                            @foreach($pivots as $pivot)
                            @php
                            $attType = $pivot->attributeValue->attribute->type;
                            $av = $pivot->attributeValue;
                            $label = $av->key;
                            $val = $av->value;
                            @endphp

                            @if($attType === 'color_palette')
                            <div class="rounded-circle border"
                                style="width: 28px; height: 28px; background: {{ $val }};" title="{{ $label }}"></div>
                            @else
                            <span class="badge bg-secondary">{{ $val }}</span>
                            @endif
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                </ul>

                <button class="btn btn-primary shadow-sm text-dark" onclick="addToCart('{{$data['product']->id}}')"><i
                        class="ti ti-shopping-cart"></i> Add to
                    cart</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-primary fw-semibold active position-relative" id="pills-home-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                            aria-controls="pills-home" aria-selected="true">Product Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-primary fw-semibold position-relative" id="pills-reviews-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab"
                            aria-controls="pills-reviews" aria-selected="false">Reviews</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-primary fw-semibold position-relative" id="pills-shipping-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-shipping" type="button" role="tab"
                            aria-controls="pills-shipping" aria-selected="false">Shipping & Return</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        {!! $data['product']->content !!}
                    </div>
                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                        <h2>Reviews Here</h2>
                    </div>
                    <div class="tab-pane fade" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab">
                        <h2>Shipping & Return policy here</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function addToCart(id) {
            alert(id)
        }

        function changeImage(event, src) {
                    document.getElementById('mainImage').src = src;
                    document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
                    event.target.classList.add('active');
                }
    </script>
    @endpush
</x-layouts.guest>
