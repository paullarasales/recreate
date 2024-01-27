<div class="relative">
    <label for="profile" class="bg-blue-500 text-white py-2 px-4 h-9 rounded cursor-pointer">Change Profile</label>
    <input type="file" id="profile" name="profile" accept="image/jpeg,png,jpg" class="hidden" onchange="updateLabel()">

    <script>
        function updateLabel() {
        var fileName = document.getElementById("profile").files[0]?.name || 'No file chosen';
        document.getElementById("fileName").innerText = fileName;
        
        if (fileName.files && fileName.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataUrl(fileName.files[0]);
        }
       
    }
    </script>
</div>