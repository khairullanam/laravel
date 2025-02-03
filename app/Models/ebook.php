<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ebook extends Model
{
    use HasFactory;
    protected $table = 'ebook';
    protected $fillable = ['title', 'file', 'size','kategori'];
}

// $hmiEbooks = ebook::where('kategori', 'hmi')->get();
// $keIslamanEbooks = ebook::where('kategori', 'ke-islaman')->get();
// $keIndonesiaanEbooks = ebook::where('kategori', 'ke-indonesiaan')->get();
