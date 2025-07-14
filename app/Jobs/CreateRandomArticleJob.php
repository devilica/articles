<?php
namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\Dispatchable; 
use Faker\Factory as Faker;

class CreateRandomArticleJob implements ShouldQueue
{
    use Queueable, Dispatchable;

    public function handle()
    {
        $faker = Faker::create();

        $response = Http::get('https://www.omdbapi.com/', [
            'apikey' => '8741954c',
            's' => 'end',
        ]);

        $items = $response->json('Search', []);

        if (count($items) === 0) {
            return; // no items found
        }

        // Pick random movie from results
        $movie = $items[array_rand($items)];

        $title = [
            'en' => $movie['Title'],
            'de' => $movie['Title'], 
        ];

        $imageUrl = $movie['Poster'] !== 'N/A' ? $movie['Poster'] : null;
        $imagePath = null;
        if ($imageUrl) {
            $imageContents = file_get_contents($imageUrl);
            $fileName = 'articles/'.uniqid().'.jpg';
            Storage::disk('public')->put($fileName, $imageContents);
            $imagePath = $fileName;
        }

        // Generate fake random text
        $text = [
            'en' => $faker->paragraphs(3, true),
            'de' => $faker->paragraphs(3, true),
        ];

        Article::create([
            'title' => json_encode($title),
            'text' => json_encode($text),
            'image' => Storage::url($imagePath),
            'view_count' => 0,
        ]);
    }
}
