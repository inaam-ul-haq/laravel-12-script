@push('auth_styles')
    <style>
        #drag_area {
            border: 2px dotted;
            height: 10rem;
            width: 100%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative;
        }

        #drag_area img {
            max-width: 100%;
            max-height: 100%;
            display: none;
            /* Hide initially */
        }

        #drag_area p {
            margin: 0;
        }
    </style>
@endpush

<div id="drag_area">
    <i class="ti ti-cloud-upload" style="font-size: 4rem; color: var(--primary-color) !important;"></i>
    <p>Drag image here or click to upload</p>
    <img id="previewImage" src="#" alt="Preview" class="img-responsive" />
    <input type="file" id="uploadFile" name="dragimage" accept="image/*" hidden />
</div>

@push('auth_scripts')
    <script>
        const dragArea = document.getElementById('drag_area');
        const uploadFile = document.getElementById('uploadFile');
        const previewImage = document.getElementById('previewImage');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dragArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dragArea.addEventListener(eventName, () => dragArea.classList.add('highlight'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dragArea.addEventListener(eventName, () => dragArea.classList.remove('highlight'), false);
        });

        dragArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFile(files[0]);
            }
        }

        uploadFile.addEventListener('change', (e) => {
            const files = e.target.files;
            if (files.length > 0) {
                handleFile(files[0]);
            }
        });

        function handleFile(file) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    dragArea.querySelector('i').style.display = 'none';
                    dragArea.querySelector('p').style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please upload a valid image file.');
            }
        }

        dragArea.addEventListener('click', () => uploadFile.click());
    </script>
@endpush
