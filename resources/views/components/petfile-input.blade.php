<div class="relative">
    <label for="photo" class="bg-blue-500 text-white py-2 px-4 h-9 rounded cursor-pointer">Upload Picture</label>
    <input type="file" id="photo" name="photo" accept="image/jpeg,png,jpg" class="hidden" onchange="updateLabel()">
    
    <!-- Add an image tag for the preview -->
    <img id="imagePreview" class="hidden w-48 h-48 mt-2" alt="Preview Image">
    
    <!-- Add a span for displaying the file name -->
    <span id="fileName" class="block text-sm text-gray-500 mt-2">No file chosen</span>

    <script>
        function updateLabel() {
            var fileName = document.getElementById("photo").files[0]?.name || 'No file chosen';
            document.getElementById("fileName").innerText = fileName;

            // Add image preview logic
            const input = document.getElementById("photo");
            const preview = document.getElementById("imagePreview");

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</div>
