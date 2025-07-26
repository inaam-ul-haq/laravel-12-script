<x-layouts.auth page-title="{{__('language.user_detail_title')}}">
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
                    <th>{{__('language.first_name_label')}}</th>
                    <td>{{ $data?->first_name }}</td>
                </tr>
                <tr>
                    <th>{{__('language.last_name_label')}}</th>
                    <td>{{ $data?->last_name }}</td>
                </tr>
                <tr>
                    <th>{{__('language.email_label')}}</th>
                    <td>{{ $data?->email }}</td>
                </tr>
            </tbody>
        </table>
    </x-auth.card>

</x-layouts.auth>
