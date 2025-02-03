<?php

namespace App\Http\Controllers;
use App\Models\ebook;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function ebook(Request $request)
    {
        // Ambil parameter kategori dari URL
        $category = $request->query('category');
        
        // Validasi kategori jika diperlukan
        $validCategories = ['hmi', 'ke-islaman', 'ke-indonesiaan', 'perempuan'];

        // Periksa apakah kategori valid
        if (!in_array($category, $validCategories)) {
            abort(404); // Jika kategori tidak valid
        }

        // Ambil data berdasarkan kategori
        $ebooks = Ebook::where('kategori', $category)->get();
        
        // Kirim data dan kategori yang dipilih ke view
        return view('ebook-' . $category, compact('ebooks', 'category'));
    }

}
