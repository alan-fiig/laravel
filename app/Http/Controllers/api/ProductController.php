<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function generarUrlFirmada($productId)
    {
        $urlFirmada = URL::temporarySignedRoute(
            'products.show.signed',
            now()->addMinutes(30),
            ['id' => $productId]
        );
        return response()->json(['signed_url' => $urlFirmada]);
    }

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
    public function show($id)
    {
        // First you search for the product
        $product = Product::find($id);

        // Then it is checked if the product was found
        if ($product) {
            return response()->json([
                'status' => true,
                'message' => 'Product found successfully!',
                'product' => $product,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Product not found.',
            ], 404);
        }
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => [
                'alpha',
                'max:10',
                Rule::unique('products')->ignore($product->id),
            ],
            'description' => 'alpha|max:10',
        ]);

        $product->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully!',
            'product' => $product,
        ], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully!',
        ], 200);
    }

    public function getProductsByDescriptionLength($length)
    {
        $products = Product::descriptionLengthShorterThan($length)->get();

        return response()->json(['products' => $products]);
    }
}
