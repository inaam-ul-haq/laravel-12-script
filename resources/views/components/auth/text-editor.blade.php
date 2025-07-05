@push('auth_styles')
    <style>
        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            min-height: 15rem !important;
            max-height: 30rem !important;
        }

        .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
        .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
            min-height: 15rem !important;
            max-height: 30rem !important;
        }
    </style>
@endpush

<x-auth.text-area name="{{ $name }}" id="{{ $id }}" place="{{ $place }}"
    required="{{ $required }}" val="{{ $val }}" label="{{ $label }}" extraclasses="ckeditor mt-3" />
