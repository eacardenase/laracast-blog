<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(
        public string $title,
        public string $excerpt,
        public $date,
        public string $body,
        public string $slug
    ) {
    }

    public static function find(string $slug): string
    {
        $path = resource_path("/posts/$slug.html");

        if (! file_exists($path)) {
            throw new ModelNotFoundException();
        }

        return cache()->remember(
            "posts.{$slug}",
            now()->addMinutes(5),
            fn () => file_get_contents($path)
        );
    }

    public static function all(): Collection
    {
        return collect(File::files(resource_path('posts')))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ));
    }
}
