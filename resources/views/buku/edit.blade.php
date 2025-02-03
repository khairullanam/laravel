<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 py-10">

    <!-- Container -->
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">

        <!-- Header -->
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Edit Ebook</h1>

        <!-- Form -->
        <form action="{{ route('ebook.update', $ebook->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title Input -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title', $ebook->title) }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Input -->
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">File (Opsional)</label>
                <input type="file" name="file" id="file" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <small class="text-gray-500">Format file yang diperbolehkan: PDF, DOC, DOCX, TXT</small>
                @error('file')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Dropdown -->
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="hmi" {{ $ebook->kategori === 'hmi' ? 'selected' : '' }}>HMI</option>
                    <option value="ke-islaman" {{ $ebook->kategori === 'ke-islaman' ? 'selected' : '' }}>Ke-Islaman</option>
                    <option value="ke-indonesiaan" {{ $ebook->kategori === 'ke-indonesiaan' ? 'selected' : '' }}>Ke-Indonesiaan</option>
                    <option value="perempuan" {{ $ebook->kategori === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('kategori')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan Perubahan</button>
            </div>

        </form>
    </div>

</body>

</html>
