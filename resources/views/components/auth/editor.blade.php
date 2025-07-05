<style>
.ck-editor__editable {
    min-height: 250px;
}
</style>
@props(['value' => null])

<div class="mt-3">
    <label for="article" class="form-label">Description</label>
    <textarea class="form-control" id="article" name="article" rows="50" placeholder="Your post description"
        value="{{ $value != null ? $value : '' }}">
@if ($value != null)
{!! $value !!}
@endif
</textarea>

    @if ($errors->has('article'))
        <span for="article" class="text-danger">{{ $errors->first('article') }}</span>
    @endif

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#article'), {
            ckfinder: {
                uploadUrl: "{{ route('uploadPostImage') . '?_token=' . csrf_token() }}"
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
