<?php
namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleList extends Component
{
    public function render()
    {
        $locale = app()->getLocale();

        $articles = Cache::remember('articles_list_' . $locale, 600, function () use ($locale) {
            return
             Article::orderBy('id', 'desc')->get()->map(function ($article) use ($locale) {
                return [
                    'id' => $article->id,
                    'title' => json_decode($article->title, true)[$locale] ?? '',
                    'text' => json_decode($article->text, true)[$locale] ?? '',
                    'view_count' => $article->view_count,
                    'created_at' => $article->created_at->format('d.m.Y H:i:s'),
                ];
            });
        });

        return view('livewire.article-list', compact('articles'));
    }
}
