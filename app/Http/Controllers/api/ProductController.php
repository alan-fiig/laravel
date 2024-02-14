<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    // public function generarUrlFirmada($productId)
    // {
    //     $urlFirmada = URL::temporarySignedRoute(
    //         'products.show.signed',
    //         now()->addMinutes(30),
    //         ['id' => $productId]
    //     );
    //     return response()->json(['signed_url' => $urlFirmada]);
    // }

    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => true,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|alpha|max:10|unique:products',
            'description' => 'required|alpha|max:10',
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Product created successfully!",
            'product' => $product
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
