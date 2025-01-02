<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ['data' => $products];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
           'name' => 'required',
           'price' => 'required|numeric',
           'discount' => 'required|numeric',
           'stoke' => 'required|integer',
       ]);

       Product::create($validated);

       return response()->json([
        'status' => true,
        'message' => "Product inserted successully."
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = $request->validate(['id' => 'required|integer']);

        $product_id = $data['id'];
        $product = Product::find($product_id);
        if($product){
            return $product;
        }else{
            return ['status' => 404, 'massage' => 'Product not found.'];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'stoke' => 'required|integer',
        ]);

        $product_id = $data['id'];
        $product = Product::find($product_id);
        if($product){
            $product->name = isset($data['name']) ? $data['name'] : $product->name;
            $product->price = isset($data['price']) ? $data['price'] : $product->price;
            $product->discount = isset($data['discount']) ? $data['discount'] : $product->discount;
            $product->stoke = isset($data['stoke']) ? $data['stoke'] : $product->stoke;
            $product->save();
            return ['status' => true, 'massage' => 'Product updated successfully.'];
        }else{
            return ['status' => 404, 'massage' => 'Product not found.'];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = $request->validate(['id' => 'required|integer']);

        $product_id = $data['id'];
        $product = Product::find($product_id);
        if($product){
            $product->delete();
        }else{
            return ['status' => 404, 'massage' => 'Product not found.'];
        }

        return ['status' => true, 'message' => 'Product successfully deleted.'];
        
    }
}
