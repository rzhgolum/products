<?php

namespace App\Services;

use App\Models\Product;
use App\Filters\ProductFilter;

class ProductService
{
    public function __construct(
        private ProductFilter $filter
    ) {}
    public function getProducts(array $filters)
    {
        return $this->filter
            ->apply(Product::query(), $filters)
            ->paginate(20);
    }
}