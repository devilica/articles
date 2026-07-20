<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

class ArticleRepository
{
    protected ?Collection $articles = null;

    public function all(): Collection
    {
        return $this->loadArticles()->sortByDesc('id')->values();
    }

    public function find(int $id): ?array
    {
        return $this->loadArticles()->firstWhere('id', $id);
    }

    public function forLocale(array $article, string $locale): array
    {
        return [
            'id' => $article['id'],
            'title' => $article['title'][$locale] ?? $article['title']['en'] ?? '',
            'text' => $article['text'][$locale] ?? $article['text']['en'] ?? '',
            'image' => $article['image'] ?? null,
            'view_count' => $article['view_count'] ?? 0,
            'created_at' => $article['created_at'] ?? '',
        ];
    }

    protected function loadArticles(): Collection
    {
        if ($this->articles === null) {
            $path = resource_path('data/articles.json');
            $data = json_decode(file_get_contents($path), true);

            $this->articles = collect($data ?? []);
        }

        return $this->articles;
    }
}
