@push('auth_styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class='required field'>
    @if ($label != null)
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif

    <select class="{{$selectclass}} form-select @error($name)
    is-invalid
    @enderror" name="{{ $name }}" data-placeholder="{{ $placeholder }}" id="{{ $id }}" {{ $attributes }}>
        <option></option>

        @if ($loopData == null)
        @else
        @foreach ($loopData as $item)
        <option value="{{ $item->id }}" {{ $item->id == $existingId ? 'selected' : '' }}>
            {{ $item->name }}
        </option>
        @endforeach
        @endif
    </select>

    @if ($errors->has($name))
    <span for="{{ $id }}" class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>

@push('auth_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
            const isAjax = @json($isAjax)

            var select2 = $('.{{$selectclass}}');

            if (select2.length) {
                select2.each(function() {
                    var $this = $(this);
                    var select2Options = {
                        dropdownParent: $this.parent(),
                        placeholder: $this.data('placeholder'),
                        allowClear: true,
                        theme: "classic",
                        delay: 250,
                        tags: '{{$tags}}',
                    };

                    if (isAjax) {
                        select2Options.ajax = {
                            url: "{{ $ajaxRoute }}",
                            dataType: 'json',
                            data: function(params) {
                                return {
                                    search: params.term,
                                    page: params.page || 1
                                };
                            },
                            processResults: function(data, params) {
                                params.page = params.page || 1;

                                return {
                                    results: data.results,
                                    pagination: {
                                        more: data.more
                                    }
                                };
                            }
                        };
                    }

                    $this.wrap('<div class="position-relative"></div>').select2(select2Options);
                });
            }
        });
</script>
@endpush
