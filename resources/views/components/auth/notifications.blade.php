<li class="nav-item dropdown ms-lg-2">
    <a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
        <i class="align-middle fas fa-bell"></i>
        @if (count($notifications) > 0)
        <span class="indicator"></span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
        <div class="dropdown-menu-header">
            @if (count($notifications) > 0)
            {{ count($notifications) }} New Notifications
            @else
            No new notifications
            @endif
        </div>
        <div class="list-group">
            @foreach ($notifications as $notification)
            <a href="#" class="list-group-item">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <i class="ms-1 text-danger fas fa-fw fa-bell"></i>
                    </div>
                    <div class="col-10">
                        <div class="text-muted small mt-1">{{ $notification->data['message'] }}</div>
                        <div class="text-muted small mt-1">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="dropdown-menu-footer">
            <a href="#" class="text-muted">Show all notifications</a>
        </div>
    </div>
</li>