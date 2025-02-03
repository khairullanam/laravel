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

<body class="bg-gray-100 py-10 flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-2xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Tambah Ebook</h2>

        <form action="{{ route('ebook.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Input -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Input -->
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">File</label>
                <input type="file" name="file" id="file" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <small class="form-text text-muted text-gray-500">Format file yang diperbolehkan: PDF, DOC, DOCX, TXT</small>
                @error('file')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Input -->
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Pilih Kategori</option>
                    <option value="hmi">HMI</option>
                    <option value="ke-islaman">Ke-Islaman</option>
                    <option value="ke-indonesiaan">Ke-Indonesiaan</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('kategori')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-full py-3 mt-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Tambah Ebook</button>
            </div>
        </form>
    </div>

</body>

</html>
