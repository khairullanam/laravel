<?php

use App\Http\Controllers\EbookController;
use App\Http\Controllers\MyController;
use App\Models\post;
use App\Http\Controllers\ProfileController;
use App\Models\lsmi;
use App\Models\lemi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LemiController;
use App\Http\Controllers\LsmiController;
use App\Models\ebook;

Route::get('/', function () {
    return view('home', ['posts'=> post::all()]);
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/about-kohati', function () {
    return view('about-kohati');
});
Route::get('/visi-misi-hmi', function () {
    return view('visi-misi-hmi');
});
Route::get('/visi-misi-kohati', function () {
    return view('visi-misi-kohati');
});
// Route::get('/ebook{cetegory}', [MyController::class, 'ebook']);
Route::get('/ebook-hmi', function () {
    return view('ebook-hmi', ['ebooks'=> ebook::all()]);
});
Route::get('/blog', function () {
    return view('blog', ['posts'=> post::paginate(6)]);
});
// Route::get('/blog/{post:slug}', function (post $post) {
//     return view('blog-detail', ['post'=> $post, 'posts' => post::all()]);
// });
// Rute untuk menampilkan blog detail berdasarkan slug
Route::get('/blog/{slug}', function ($slug) {
    // Mengambil post berdasarkan slug
    $post = Post::where('slug', $slug)->firstOrFail();
    
    // Menampilkan halaman blog-detail dengan data post
    return view('blog-detail', compact('post'));
})->name('blog.detail');
Route::get('/lemi/{post:slug}', function (lemi $post) {
    return view('blog-detail', ['post'=> $post, 'posts'=> post::all()]);
});
Route::get('/lsmi/{post:slug}', function (lsmi $post) {
    return view('blog-detail', ['post'=> $post, 'posts'=> post::all()]);
});

Route::get('/lemi', function () {
    return view('lemi', ['posts'=> lemi::paginate(6)]);
});
Route::get('/lsmi', function () {
    return view('lsmi', ['posts'=> lsmi::paginate(6)]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/lapmi', function () {
    return view('lapmi', ['posts'=> post::all()]);
})->middleware(['auth', 'verified'])->name('lapmi');
Route::get('/lemi-dash', function () {
    return view('lemi-dash', ['lemi'=> lemi::all()]);
})->middleware(['auth', 'verified'])->name('lemi-dash');
Route::get('/lsmi-dash', function () {
    return view('lsmi-dash', ['lsmi'=> lsmi::all()]);
})->middleware(['auth', 'verified'])->name('lsmi-dash');
Route::get('/ebooks', function () {
    return view('ebooks', ['ebooks'=> ebook::all()]);
})->middleware(['auth', 'verified'])->name('ebooks');
// Route::get('/ebook',)
//     ->middleware(['auth', 'verified'])
//     ->name('ebook');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/buku/create', [EbookController::class, 'create'])->name('buku.create'); // Form tambah
Route::post('/ebook/store', [EbookController::class, 'store'])->name('ebook.store'); // Proses tambah
Route::get('/buku/{id}/edit', [ebookController::class, 'edit'])->name('buku.edit'); // Rute edit
Route::put('/ebook/{id}', [ebookController::class, 'update'])->name('ebook.update'); // Rute update
Route::delete('/ebook/{id}', [ebookController::class, 'destroy'])->name('ebook.destroy'); // Rute hapus

Route::get('/post/create', [PostController::class, 'create'])->name('post.create'); // Form tambah
Route::post('/post/store', [PostController::class, 'store'])->name('post.store'); // Proses tambah
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit'); // Rute edit
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update'); // Rute update
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy'); // Rute hapus

Route::get('/ekonomi/create', [LemiController::class, 'create'])->name('ekonomi.create'); // Form tambah
Route::post('/lemi/store', [LemiController::class, 'store'])->name('lemi.store'); // Proses tambah
Route::get('/ekonomi/{id}/edit', [LemiController::class, 'edit'])->name('ekonomi.edit'); // Rute edit
Route::put('/lemi/{id}', [LemiController::class, 'update'])->name('lemi.update'); // Rute update
Route::delete('/lemi/{id}', [LemiController::class, 'destroy'])->name('lemi.destroy'); // Rute hapus

Route::get('/seni/create', [LsmiController::class, 'create'])->name('seni.create'); // Form tambah
Route::post('/lsmi/store', [LsmiController::class, 'store'])->name('lsmi.store'); // Proses tambah
Route::get('/seni/{id}/edit', [LsmiController::class, 'edit'])->name('seni.edit'); // Rute edit
Route::put('/lsmi/{id}', [LsmiController::class, 'update'])->name('lsmi.update'); // Rute update
Route::delete('/lsmi/{id}', [LsmiController::class, 'destroy'])->name('lsmi.destroy'); // Rute hapus

// Route::prefix('{type}')->group(function () {
//     Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
//     Route::get('/create', [PostController::class, 'create'])->name('post.create');
//     Route::post('/store', [PostController::class, 'store'])->name('post.store');
//     Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
//     Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
//     Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
// });

require __DIR__.'/auth.php';
