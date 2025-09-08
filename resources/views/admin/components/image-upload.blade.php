@props(['name', 'label', 'currentImage' => null, 'required' => false, 'accept' => 'image/*', 'maxSize' => '2MB'])

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
    </label>
    
    <div id="image-upload-area-{{ $name }}" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#265478] transition-colors cursor-pointer">
        <div id="upload-content-{{ $name }}" class="{{ $currentImage ? 'hidden' : '' }}">
            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
            <p class="text-sm text-gray-600 mb-2">Drag and drop an image here, or click to select</p>
            <p class="text-xs text-gray-500">PNG, JPG, GIF up to {{ $maxSize }}</p>
            <input type="file" name="{{ $name }}" id="{{ $name }}" accept="{{ $accept }}" class="hidden">
        </div>
        <div id="image-preview-{{ $name }}" class="{{ $currentImage ? '' : 'hidden' }}">
            @if($currentImage)
                <img id="preview-img-{{ $name }}" src="{{ asset('storage/' . $currentImage) }}" alt="Preview" class="max-w-full h-auto rounded-lg mx-auto mb-4 max-h-64">
            @else
                <img id="preview-img-{{ $name }}" src="" alt="Preview" class="max-w-full h-auto rounded-lg mx-auto mb-4 max-h-64">
            @endif
            <button type="button" id="remove-image-{{ $name }}" class="text-red-600 hover:text-red-800 text-sm">
                <i class="fas fa-trash mr-1"></i>Remove Image
            </button>
        </div>
    </div>
    
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const uploadArea = document.getElementById('image-upload-area-{{ $name }}');
    const input = document.getElementById('{{ $name }}');
    const preview = document.getElementById('image-preview-{{ $name }}');
    const previewImg = document.getElementById('preview-img-{{ $name }}');
    const removeBtn = document.getElementById('remove-image-{{ $name }}');
    const uploadContent = document.getElementById('upload-content-{{ $name }}');

    // Click to open file selector
    uploadArea.addEventListener('click', () => input.click());

    // Drag & Drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('border-[#265478]', 'bg-blue-50');
    });

    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-[#265478]', 'bg-blue-50');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-[#265478]', 'bg-blue-50');
        if (e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            showPreview(e.dataTransfer.files[0]);
        }
    });

    // File selected
    input.addEventListener('change', (e) => {
        if (e.target.files.length) {
            showPreview(e.target.files[0]);
        }
    });

    // Remove image
    removeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        resetImageUpload();
    });

    function showPreview(file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select an image file.');
            return;
        }

        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File size must be less than 2MB.');
            return;
        }

        const url = URL.createObjectURL(file);
        previewImg.src = url;
        uploadContent.classList.add('hidden');
        preview.classList.remove('hidden');
    }

    function resetImageUpload() {
        input.value = '';
        uploadContent.classList.remove('hidden');
        preview.classList.add('hidden');
        previewImg.src = '';
    }
});
</script>
