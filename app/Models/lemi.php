<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class lemi extends Model
{
    protected $table = 'lemi';
    protected $fillable = ['title', 'slug', 'author','body', 'image','published_at'];
    // Fungsi untuk otomatis generate slug berdasarkan title
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            // Generate slug otomatis dari title
            if (!$post->slug) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
