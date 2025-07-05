@push('auth_styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@endpush

<table id="{{ $id }}" class="datatables-users table card-datatable table-responsive">
    {{ $slot }}
</table>

@push('auth_scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $("#{{ $id }}").DataTable({
            responsive: false,
            ordering: true,
            select: false,
            paging: false,
            info: false,


                searching: '{{ $search ? true : false }}',

        });
</script>
@endpush
