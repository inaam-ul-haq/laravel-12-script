<div class="text-center">
    <img id="profileImage" alt="Chris Wood" src="{{ $image == '' ? fileUrl() : $image }}"
        class="rounded-circle img-responsive mt-2" width="128" height="128" />
    <div class="mt-2">
        <span class="btn btn-outline-primary" id="uploadButton"><i class="fas fa-upload"></i> Upload</span>
    </div>
    <small>For best results, use an image at least 128px by 128px in .jpg format</small>
    <!-- Hidden file input -->
    <input type="file" name="file" id="fileInput" accept="image/*" style="display: none;" />
</div>

<script>
    document.getElementById('uploadButton').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
