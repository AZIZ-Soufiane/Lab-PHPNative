<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    public function getBooks(): array
    {
        try {
            $response = Http::timeout(10)->get('https://openlibrary.org/search.json', [
                'q' => 'best seller',
                'limit' => 40,
                'fields' => 'key,title,author_name,first_publish_year,cover_i',
            ]);

            $rawBooks = $response->successful()
                ? ($response->json()['docs'] ?? [])
                : [];
        } catch (\Exception $e) {
            $rawBooks = [];
        }

        return $this->formatBooks($rawBooks);
    }

    public function searchBooks(string $query): array
    {
        try {
            $response = Http::timeout(10)->get('https://openlibrary.org/search.json', [
                'q' => $query,
                'limit' => 40,
                'fields' => 'key,title,author_name,first_publish_year,cover_i',
            ]);

            $rawBooks = $response->successful()
                ? ($response->json()['docs'] ?? [])
                : [];
        } catch (\Exception $e) {
            $rawBooks = [];
        }

        return $this->formatBooks($rawBooks);
    }

    private function formatBooks(array $rawBooks): array
    {
        return collect($rawBooks)->map(function ($book) {
            return [
                'key' => $book['key'] ?? uniqid(),
                'title' => $book['title'] ?? 'Unknown Title',
                'author' => isset($book['author_name']) ? $book['author_name'][0] : 'Unknown Author',
                'year' => $book['first_publish_year'] ?? '',
                'coverUrl' => isset($book['cover_i'])
                    ? "https://covers.openlibrary.org/b/id/{$book['cover_i']}-M.jpg"
                    : null,
            ];
        })->values()->all();
    }
}
