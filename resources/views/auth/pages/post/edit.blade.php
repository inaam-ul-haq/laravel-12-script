<x-layouts.auth>
    <x-slot name="pageTitle">{{__('language.edit_post')}}</x-slot>

    <x-auth.form form-action="{{ route('blog.post.update', $data->id) }}" enctype="true" form-id="submitProduct">
        @method('PUT')

        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <x-auth.card card-header="{{__('language.edit_post')}}">
                            <div class="product_title">
                                <x-auth.input-field type="text" name="title" id="title" required="true"
                                    place="{{ __('language.title') }}" val="{{ $data->title }}" extraclasses=""
                                    label="{{ __('language.title') }}" />
                                <small class="text-danger">{{ $setting->url }}/<span id="editableSlug"
                                        style="border-bottom: 1px solid red; cursor: pointer;">{{ $data->slug }}</span></small>

                                <input type="hidden" name="slug" id="slugInputField" value="{{ $data->slug }}">
                            </div>

                            <div class="mt-3">
                                <x-auth.text-editor name='short_description' id='short_description' class="ckeditor"
                                    place="{{__('language.short_description_place')}}" :val="$data->short_summary"
                                    required="" label="{{__('language.short_description_title')}}" />
                            </div>

                            <div class="mt-3">
                                <x-auth.text-editor name='content' id='content' class="ckeditor"
                                    place="{{__('language.description_title')}}" :val="$data->content" required=""
                                    label="{{__('language.description_title')}}" />
                            </div>
                        </x-auth.card>
                    </div>

                    <div class="col-md-12">
                        <x-auth.card card-header="{{__('language.seo_setting_title')}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <x-auth.input-field type="text" name="focus_keyword" id="focus_keyword"
                                        required="true" place="{{ __('language.focus_keyword') }}"
                                        val="{{ $data?->meta_detail?->focus_keyword }}" extraclasses="" label="" />
                                </div>

                                <div class="col-md-12 mt-3">
                                    <x-auth.input-field type="text" name="meta_title" id="meta_title" required="true"
                                        place="{{ __('language.meta_title') }}"
                                        val="{{ $data?->meta_detail?->meta_title }}" extraclasses="" label="" />
                                </div>

                                <div class="col-md-12 mt-3">
                                    <x-auth.text-area type="text" name="meta_description" id="meta_description"
                                        required="true" place="{{ __('language.meta_description') }}"
                                        val="{{ $data?->meta_detail?->meta_description }}" extraclasses="" label="" />
                                </div>
                            </div>

                        </x-auth.card>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-md-12">
                    <x-auth.card card-header="">
                        <x-slot name="headerCustom">
                            <x-auth.input-button btn-class="btn-danger btn-sm" btn-type="reset"
                                btn-value="{{ __('language.cancel_button') }}" id="cancel_product" />

                            <x-auth.input-button btn-class="btn-warning btn-sm" btn-type="submit"
                                btn-value="{{ __('language.save_button') }}" id="save_products" name="status" />

                            <x-auth.input-button btn-class="btn-primary btn-sm" btn-type="submit"
                                btn-value="{{ __('language.publish_button') }}" id="publish_products" name="status" />
                        </x-slot>

                        <p>Date: {{ date('d-M-Y') }}</p>
                        <p>Author: {{ auth()->user()->full_name }}</p>

                        <x-image-drag-drop />

                        <div class="mt-3">
                            <x-category-list />
                        </div>
                    </x-auth.card>
                </div>
            </div>
        </div>
    </x-auth.form>

    @push('auth_scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

                    document.querySelectorAll('.ckeditor').forEach(textarea => {
                        ClassicEditor
                            .create(textarea, {
                                heading: {
                                    options: [{
                                            model: 'paragraph',
                                            title: 'Paragraph',
                                            class: 'ck-heading_paragraph'
                                        },
                                        {
                                            model: 'heading1',
                                            view: 'h1',
                                            title: 'Heading 1',
                                            class: 'ck-heading_heading1'
                                        },
                                        {
                                            model: 'heading2',
                                            view: 'h2',
                                            title: 'Heading 2',
                                            class: 'ck-heading_heading2'
                                        },
                                        {
                                            model: 'heading3',
                                            view: 'h3',
                                            title: 'Heading 3',
                                            class: 'ck-heading_heading3'
                                        },
                                        {
                                            model: 'heading4',
                                            view: 'h4',
                                            title: 'Heading 4',
                                            class: 'ck-heading_heading4'
                                        },
                                        {
                                            model: 'heading5',
                                            view: 'h5',
                                            title: 'Heading 5',
                                            class: 'ck-heading_heading5'
                                        },
                                        {
                                            model: 'heading6',
                                            view: 'h6',
                                            title: 'Heading 6',
                                            class: 'ck-heading_heading6'
                                        }
                                    ]
                                },
                                ckfinder: {
                                    uploadUrl: "{{ route('uploadPostImage') . '?_token=' . csrf_token() }}"
                                }
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    });
                });
    </script>

    <script>
        const titleInput = document.getElementById('title');
                const editableSlug = document.getElementById('editableSlug');
                const slugInputField = document.getElementById('slugInputField');

                function generateSlug(text) {
                    return text
                        .toLowerCase()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                }

                titleInput.addEventListener('input', () => {
                    const slug = generateSlug(titleInput.value);
                    editableSlug.textContent = slug;
                    slugInputField.value = slug;
                });

                editableSlug.addEventListener('click', () => {
                    const slugWidth = editableSlug.offsetWidth + 40;
                    const currentText = editableSlug.textContent;
                    const inputField = document.createElement('input');
                    inputField.type = 'text';
                    inputField.value = currentText;
                    inputField.style.width = `${slugWidth}px`;
                    inputField.style.border = '1px solid #ccc';
                    inputField.style.padding = '2px';

                    slugInputField.value = currentText;

                    editableSlug.replaceWith(inputField);
                    inputField.focus();

                    const saveChanges = () => {
                        const newText = generateSlug(inputField.value.trim());
                        editableSlug.textContent = newText;
                        slugInputField.value = newText;
                        inputField.replaceWith(editableSlug);
                    };

                    inputField.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter') {
                            saveChanges();
                        }
                    });

                    inputField.addEventListener('blur', () => {
                        saveChanges();
                    });
                });
    </script>
    @endpush
</x-layouts.auth>