<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\ebook;


class EbookController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter kategori dari URL
        $category = $request->query('category');
    
        // Ambil data berdasarkan kategori
        $ebooks = Ebook::where('kategori', $category)->get();
    
        // Kirim data kategori dan ebooks ke view
        return view('ebooks.index', compact('ebooks', 'category'));
    }
    

    
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data ke database
    public function store(Request $request)
{
    // Validasi data
    $validated = $request->validate([
        'title' => 'required|max:255',
        'file' => 'required|file|mimes:pdf,doc,docx,txt',
        'kategori' => 'required|string|max:255',
    ]);

    // Upload file
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        
        // Ambil ekstensi file yang diunggah
        $extension = $file->getClientOriginalExtension();
        
        // Buat nama file baru berdasarkan title yang diinput dan tambahkan ekstensi file
        $fileName = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $validated['title'])) . '.' . $extension;
        
        // Simpan file dengan nama yang telah diubah ke folder 'files' di disk public
        $filePath = $file->storeAs('files', $fileName, 'public');

        // Tambahkan ukuran file otomatis (dalam MB)
        $validated['file'] = $filePath;
        $validated['size'] = round($file->getSize() / 1048576, 2); // Ukuran dalam MB
    }

    // Simpan data ke database
    Ebook::create($validated);

    // Redirect atau kirim respons
    return redirect()->route('ebooks')->with('success', 'Data berhasil ditambahkan');
}


public function edit($id)
{
    // Ambil data ebook berdasarkan ID
    $ebook = Ebook::findOrFail($id);

    // Kirim data ebook ke view untuk diedit
    return view('buku.edit', compact('ebook'));
}


// Update function
public function update(Request $request, $id)
{
    // Validasi data
    $validated = $request->validate([
        'title' => 'required|max:255',
        'file' => 'nullable|file|mimes:pdf,doc,docx,txt',
        'kategori' => 'required|string|max:255',
    ]);

    // Cari data ebook berdasarkan ID
    $ebook = Ebook::findOrFail($id);

    // Update judul dan kategori
    $ebook->title = $validated['title'];
    $ebook->kategori = $validated['kategori'];

    // Cek jika ada file baru yang diunggah
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        
        // Ambil ekstensi file yang diunggah
        $extension = $file->getClientOriginalExtension();
        
        // Buat nama file baru berdasarkan title yang diinput dan tambahkan ekstensi file
        $fileName = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $validated['title'])) . '.' . $extension;
        
        // Simpan file dengan nama yang telah diubah ke folder 'files' di disk public
        $filePath = $file->storeAs('files', $fileName, 'public');

        // Tambahkan ukuran file otomatis (dalam MB)
        $ebook->file = $filePath;
        $ebook->size = round($file->getSize() / 1048576, 2); // Ukuran dalam MB
    }

    // Simpan perubahan
    $ebook->save();

    // Redirect atau kirim respons
    return redirect()->route('ebooks')->with('success', 'Data berhasil diperbarui');
}



// Delete function
public function destroy($id)
{
    // Cari data ebook berdasarkan ID
    $ebook = Ebook::findOrFail($id);

    // Hapus file yang sudah diunggah
    if ($ebook->file) {
        Storage::delete('public/' . $ebook->file); // Menghapus file dari disk public
    }

    // Hapus data ebook dari database
    $ebook->delete();

    // Redirect atau kirim respons
    return redirect()->route('ebooks')->with('success', 'Data berhasil dihapus');
}
}
