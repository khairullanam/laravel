<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function show($slug)
{
    // Ambil post berdasarkan slug
    $post = Post::where('slug', $slug)->firstOrFail();

    // Kirim data ke view
    return view('blog-detail', compact('post'));
}

    // Menampilkan form tambah
    public function create()
    {
        return view('post.create');
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'body' => 'required|string',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Menyimpan gambar ke folder 'images' di disk public
        }
         // Upload image
        $validated['image'] = $imagePath;
        // Simpan data ke database
        Post::create($validated);

        // Redirect atau kirim respons
        return redirect()->route('lapmi')->with('success', 'Data berhasil ditambahkan');
    }
    
     // Edit function
     public function edit($id)
     {
         $post = Post::findOrFail($id); // Ambil data berdasarkan ID
         return view('post.edit', compact('post')); // Tampilkan view edit
     }
 
     // Update function
     public function update(Request $request, $id)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'author' => 'required|string|max:255',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'body' => 'required',
             'published_at' => 'required|date',
         ]);
 
         $post = Post::findOrFail($id); // Ambil data berdasarkan ID
         $post->title = $request->title;
         $post->slug = Str::slug($request->title);
         $post->author = $request->author;
         $post->body = $request->body;
         $post->published_at = $request->published_at;
 
         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('images', 'public'); // Simpan gambar
             $post->image = $imagePath; // Update path gambar
         }
 
         $post->save(); // Simpan perubahan ke database
 
         return redirect()->route('lapmi')->with('success', 'Post berhasil diperbarui!');
     }
 
     // Delete function
     public function destroy($id)
     {
         $post = Post::findOrFail($id); // Ambil data berdasarkan ID
         $post->delete(); // Hapus data
 
         return redirect()->route('lapmi')->with('success', 'Post berhasil dihapus!');
     }
}
