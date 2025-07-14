<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleShow extends Component
{
    public $articleId;
    public $article;

    public function mount($id)
    {
        $this->articleId = $id;
        $locale = app()->getLocale();

        $this->article = Cache::remember('article_'.$id.'_'.$locale, 600, function () use ($id, $locale) {
            $article = Article::findOrFail($id);

            return [
                'title' => json_decode($article->title, true)[$locale] ?? '',
                'text' => json_decode($article->text, true)[$locale] ?? '',
                'image' => $article->image ?? null,
                'view_count' => $article->view_count,
            ];
        });
    }

    public function render()
    {
        return view('livewire.article-show');
    }
}
