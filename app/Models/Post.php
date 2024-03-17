<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

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

    public static function all(): array
    {
        $files = File::files(resource_path('posts'));

        return array_map(fn ($file) => $file->getContents(), $files);
    }
}
