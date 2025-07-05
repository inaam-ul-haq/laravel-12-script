<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="{{ asset('dashboard/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    function showToaster(type, message, title) {
        toastr.options.closeButton = true;
        toastr.options.showMethod = 'slideDown';
        toastr.options.closeEasing = 'swing';
        toastr.options.progressBar = true;
        toastr.options.timeOut = 2500;
        toastr.options.positionClass = "toast-bottom-right";

        toastr[type](message, title);
    }

    @if (session('success'))
        showToaster('success', '{{ session('success') }}', 'Success');
    @elseif (session('error'))
        showToaster('error', '{{ session('error') }}', 'Error');
    @elseif (session('info'))
        showToaster('info', '{{ session('info') }}', 'Info');
    @elseif (session('warning'))
        showToaster('warning', '{{ session('warning') }}', 'Warning');
    @endif
</script>
