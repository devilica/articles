<?php
namespace App\Http\Livewire;

use App\Repositories\ArticleRepository;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class ArticleList extends Component
{
    public function render()
    {
        $locale = app()->getLocale();
        $repository = app(ArticleRepository::class);

        $articles = Cache::remember('articles_list_' . $locale, 600, function () use ($locale, $repository) {
            return $repository->all()->map(function ($article) use ($locale, $repository) {
                $localized = $repository->forLocale($article, $locale);

                return [
                    'id' => $localized['id'],
                    'title' => $localized['title'],
                    'text' => $localized['text'],
                    'view_count' => $localized['view_count'],
                    'created_at' => date('d.m.Y H:i:s', strtotime($localized['created_at'])),
                ];
            });
        });

        return view('livewire.article-list', compact('articles'));
    }
}
