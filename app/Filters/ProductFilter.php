<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter
{
    protected array $map = [
        'q' => 'search',
        'price_from' => 'priceFrom',
        'price_to' => 'priceTo',
        'category_id' => 'category',
        'in_stock' => 'inStock',
        'rating_from' => 'ratingFrom',
        'sort' => 'sort',
    ];

    public function apply(Builder $query, array $filters): Builder
    {
        foreach ($this->map as $key => $method) {
            if (array_key_exists($key, $filters)) {
                $this->$method($query, $filters[$key], $filters);
            }
        }

        return $query;
    }

    private function search(Builder $query, $value): void
    {
        $query->where('name', 'like', "%{$value}%");
    }

    private function priceFrom(Builder $query, $value): void
    {
        $query->where('price', '>=', $value);
    }

    private function priceTo(Builder $query, $value): void
    {
        $query->where('price', '<=', $value);
    }

    private function category(Builder $query, $value): void
    {
        $query->where('category_id', $value);
    }

    private function inStock(Builder $query, $value): void
    {
        $query->where(
            'in_stock',
            filter_var($value, FILTER_VALIDATE_BOOLEAN)
        );
    }

    private function ratingFrom(Builder $query, $value): void
    {
        $query->where('rating', '>=', $value);
    }

    private function sort(Builder $query, $value): void
    {
        match ($value) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'rating_desc' => $query->orderBy('rating', 'desc'),
            'newest' => $query->orderBy('created_at', 'desc'),
            default => null,
        };
    }
}