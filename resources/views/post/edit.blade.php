<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Edit Post</h2>
        
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="mt-2 block w-full px-4 py-2 border rounded-md" required>
            </div>

            <!-- Author -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" name="author" id="author" value="{{ $post->author }}" class="mt-2 block w-full px-4 py-2 border rounded-md" required>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="mt-2 block w-full px-4 py-2 border rounded-md">
                <img src="{{ Storage::url($post->image) }}" alt="Current Image" class="mt-4 w-32 h-32">
            </div>

            <!-- Body -->
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea name="body" id="editor" class="mt-2 block w-full px-4 py-2 border rounded-md">{{ $post->body }}</textarea>
            </div>

            <!-- Published At -->
            <div class="mb-4">
                <label for="published_at" class="block text-sm font-medium text-gray-700">Published At</label>
                <input type="datetime-local" name="published_at" id="published_at" value="{{ date('Y-m-d\TH:i', strtotime($post->published_at)) }}" class="mt-2 block w-full px-4 py-2 border rounded-md" required>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading',       // Untuk memilih heading
                    '|',
                    'bold',          // Bold
                    'italic',        // Italic
                    'underline',     // Underline
                    'strikethrough', // Strikethrough
                    '|',
                    'bulletedList',  // Bullet points
                    'numberedList',  // Numbered list
                    '|',
                    'blockQuote',    // Blockquote
                    'link',          // Link
                    'imageUpload',   // Upload image
                    'mediaEmbed',    // Embed media (misalnya video)
                    'undo',          // Undo
                    'redo'           // Redo
                ],
                // Tambahan konfigurasi lain (opsional)
                language: 'en', // Bahasa editor
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    
</body>
</html>
