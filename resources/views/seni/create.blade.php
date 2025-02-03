
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Lemi</title>
    
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body class="bg-gray-100 py-10">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Tambah Lemi</h2>
        
        <form action="{{ route('lsmi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    class="mt-2 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    required>
            </div>

            <!-- Slug -->
            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input 
                    type="text" 
                    name="slug" 
                    id="slug" 
                    value="{{ old('slug') }}" 
                    class="mt-2 block w-full px-4 py-2 border rounded-md shadow-sm bg-gray-100" 
                    readonly>
            </div>

            <!-- Author -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input 
                    type="text" 
                    name="author" 
                    id="author" 
                    class="mt-2 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    required>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input 
                    type="file" 
                    name="image" 
                    id="image" 
                    accept="image/*" 
                    class="mt-2 block w-full px-4 py-2 border rounded-md shadow-sm" 
                    required>
            </div>

            <!-- Body -->
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea 
                    name="body" 
                    id="editor" 
                    class="mt-2 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    required>
                </textarea>
            </div>

            <!-- Published At -->
            <div class="mb-4">
                <label for="published_at" class="block text-sm font-medium text-gray-700">Published At</label>
                <input 
                    type="datetime-local" 
                    name="published_at" 
                    id="published_at" 
                    class="mt-2 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    required>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button 
                    type="submit" 
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Tambah
                </button>
            </div>
        </form>
    </div>

    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                // Ensure the form can submit the editor's content
                document.querySelector('form').addEventListener('submit', function () {
                    const editorData = editor.getData(); // Get data from CKEditor
                    document.querySelector('#editor').value = editorData; // Set value to the hidden textarea
                });
            })
            .catch(error => {
                console.error('CKEditor initialization error:', error);
            });

        // Generate slug from title input
        document.querySelector('#title').addEventListener('input', function () {
            let title = this.value.trim(); // Trim leading/trailing spaces
            let slug = title
                .toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with hyphens
                .replace(/[^\w-]+/g, '') // Remove non-word characters
                .replace(/--+/g, '-') // Replace multiple hyphens with one
                .replace(/^-+|-+$/g, ''); // Remove leading or trailing hyphens
            document.querySelector('#slug').value = slug;
        });
    </script>

</body>
</html>
