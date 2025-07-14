<?php

namespace App\Models;

use App\Mail\ArticleCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'image',
        'view_count',
    ];

    protected static function booted()
    {
        static::created(function ($article) {
            Mail::to('admin@example.com')->send(new ArticleCreated($article));
        });
    }
}
