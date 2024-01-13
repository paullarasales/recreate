<div class="relative">
    <label for="profile" class="bg-blue-500 text-white py-2 px-4 h-9 rounded cursor-pointer">Upload Picture</label>
    <input type="file" id="photo" name="photo" accept="image/jpeg,png,jpg" class="hidden" onchange="updateLabel()">

    <script>
        function updateLabel() {
        var fileName = document.getElementById("photo").files[0]?.name || 'No file chosen';
        document.getElementById("fileName").innerText = fileName;
    }
    </script>
</div>
