<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->only(['code', 'name', 'quantifier', 'quantity']));

        return response()->json([
            'message' => 'Produk berhasil disimpan.',
            'product' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest  $request
     * @param  Product  $product
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $product->update($request->validated());

        return \response()->json([
            'message' => 'Produk berhasil diperbarui.',
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus.',
        ]);
    }

    /**
     * Search products by code product
     *
     * @param $code
     * @return JsonResponse
     */
    public function search($code): JsonResponse
    {
        $products = Product::where('code', 'like', '%'.$code.'%')->get();

        return response()->json($products);
    }
}
