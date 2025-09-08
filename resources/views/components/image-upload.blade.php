@props([
    'name' => 'image',
    'label' => 'Image',
    'currentImage' => null,
    'folder' => 'images',
    'accept' => 'image/*',
    'maxSize' => '2MB',
    'previewClass' => 'max-h-64'
])

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
    <div id="image-upload-area-{{ $name }}" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#265478] transition-colors cursor-pointer">
        <div id="upload-content-{{ $name }}" class="{{ $currentImage ? 'hidden' : '' }}">
            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
            <p class="text-sm text-gray-600 mb-2">Drag & drop or click to select</p>
            <p class="text-xs text-gray-500">PNG, JPG up to {{ $maxSize }}</p>
            <input type="file" name="{{ $name }}" id="{{ $name }}" accept="{{ $accept }}" class="hidden">
        </div>
        <div id="image-preview-{{ $name }}" class="{{ $currentImage ? '' : 'hidden' }}">
            <img id="preview-img-{{ $name }}" 
                 src="{{ $currentImage ? (str_starts_with($currentImage, 'http') ? $currentImage : asset($currentImage)) : '' }}" 
                 alt="Preview" class="max-w-full h-auto rounded-lg mx-auto mb-4 {{ $previewClass }}">
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
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('image-upload-area-{{ $name }}');
    const fileInput = document.getElementById('{{ $name }}');
    const uploadContent = document.getElementById('upload-content-{{ $name }}');
    const previewArea = document.getElementById('image-preview-{{ $name }}');
    const previewImg = document.getElementById('preview-img-{{ $name }}');
    const removeBtn = document.getElementById('remove-image-{{ $name }}');

    if (!uploadArea || !fileInput || !uploadContent || !previewArea || !previewImg || !removeBtn) {
        console.error('Image upload elements not found for {{ $name }}');
        return;
    }

    // Click to open file dialog
    uploadArea.addEventListener('click', () => fileInput.click());

    // Handle file selection
    fileInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                previewImg.src = event.target.result;
                uploadContent.classList.add('hidden');
                previewArea.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag & drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('border-[#265478]');
    });
    
    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-[#265478]');
    });
    
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-[#265478]');
        const file = e.dataTransfer.files[0];
        if (file) {
            fileInput.files = e.dataTransfer.files; // Update the input
            const reader = new FileReader();
            reader.onload = (event) => {
                previewImg.src = event.target.result;
                uploadContent.classList.add('hidden');
                previewArea.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove image
    removeBtn.addEventListener('click', () => {
        previewImg.src = '';
        fileInput.value = '';
        previewArea.classList.add('hidden');
        uploadContent.classList.remove('hidden');
    });
});
</script>
