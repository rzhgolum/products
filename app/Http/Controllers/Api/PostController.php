<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use App\Services\ProductService;

class PostController extends Controller
{

    public function __construct(
        private ProductService $productService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json(
            $this->productService->getProducts($request->all())
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
