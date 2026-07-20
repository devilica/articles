<?php

namespace App\Http\Livewire;

use App\Repositories\ArticleRepository;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class ArticleShow extends Component
{
    public $articleId;
    public $article;

    public function mount($id)
    {
        $this->articleId = $id;
        $locale = app()->getLocale();
        $repository = app(ArticleRepository::class);

        $this->article = Cache::remember('article_'.$id.'_'.$locale, 600, function () use ($id, $locale, $repository) {
            $article = $repository->find((int) $id);

            if ($article === null) {
                abort(404);
            }

            $localized = $repository->forLocale($article, $locale);

            return [
                'title' => $localized['title'],
                'text' => $localized['text'],
                'image' => $localized['image'],
                'view_count' => $localized['view_count'],
            ];
        });
    }

    public function render()
    {
        return view('livewire.article-show');
    }
}
