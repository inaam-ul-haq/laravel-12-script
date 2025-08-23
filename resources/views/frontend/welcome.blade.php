<x-layouts.guest page-title="" :meta-details="null">

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div id="featuredCarousel" class="carousel slide shadow-sm rounded-3 overflow-hidden"
                        data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($featured as $feature)
                            <button type="button" data-bs-target="#featuredCarousel"
                                data-bs-slide-to="{{ $loop->index }}" @if($loop->first)
                                class="active" aria-current="true" @endif
                                aria-label="Slide {{ $loop->iteration }}">
                            </button>
                            @endforeach
                        </div>

                        <div class="carousel-inner">
                            @foreach ($featured as $feature)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ $feature->fileUrl('thumbnail') }}" class="d-block w-100"
                                    alt="{{ $feature->title }}">

                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                                    <h5>
                                        <a href="{{ route('welcome') }}" class="text-white text-decoration-none">
                                            {{ $feature->title }}
                                        </a>
                                    </h5>
                                    <p>{{ $feature->meta_detail->meta_description ?? '' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                @foreach ($posts as $post)
                <div class="col-md-3">
                    <x-card>
                        <img src="{{$post->fileUrl('thumbnail')}}" class="card-img-top p-0"
                            alt="{{$post->fileUrl('thumbnail')}}">

                        <div class="card-body">
                            <h5 class="card-title"> <a href="{{ route('welcome') }}">{{$post->title}}</a> </h5>
                            <p class="card-text">
                                {{$post->meta_detail->meta_description ?? ''}}
                            </p>
                        </div>
                    </x-card>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>
</x-layouts.guest>