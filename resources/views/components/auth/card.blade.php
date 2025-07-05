<div class="card shadow-sm border-0 {{ $card }} border-bottom border-{{ $cardBorder }} rounded-2">
    @if ($cardHeader != null || isset($headerButton) || isset($headerCustom))
    <div class="card-header pb-0 rounded-4">
        <div class="card-actions float-end">
            @if (isset($headerButton))
            <a href="javascript::void(0)" class="me-1" onclick="location.reload()">
                <i class="align-middle" data-feather="refresh-cw"></i>
            </a>
            {{-- <div class="d-inline-block dropdown show">
                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                    <i class="align-middle" data-feather="more-vertical"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div> --}}
            @endif

            @if (isset($headerCustom))
            {{ $headerCustom }}
            @endif
        </div>
        <h6 class="card-title  fs  fw-semibold">{{ isset($cardHeader) ? $cardHeader : '' }}</h6>
    </div>
    @endif

    <div class="card-body {{ $cardBody }}">
        {{ $slot }}
    </div>
</div>
