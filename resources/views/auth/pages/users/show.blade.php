<x-layouts.auth page-title="Users detail">
    <x-auth.card card-header="{{ $data?->full_name }} Detail">
        <div class="row g-0">
            <div class="col-sm-3 col-xl-12 col-xxl-4 text-center">
                <img src="{{ $data?->profile() }}" width="64" height="64" class="rounded-circle mt-2"
                    alt="{{ $data?->full_name }}">
            </div>
            <div class="col-sm-9 col-xl-12 col-xxl-8">
                <strong>About me</strong>
                <p>{{ $data?->about }}</p>
            </div>
        </div>

        <table class="table">
            <tbody>
                <tr>
                    <th>First Name</th>
                    <td>{{ $data?->first_name }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $data?->last_name }}</td>
                </tr>
                <tr>
                    <th>User Email</th>
                    <td>{{ $data?->email }}</td>
                </tr>
            </tbody>
        </table>
    </x-auth.card>

</x-layouts.auth>
