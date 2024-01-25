<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('pages.shop', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addproduct()
    {
        $categories = Category::all();
        return view('admin.add_product', ['categories' => $categories]);
    }

    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'category' => 'required',
        //     'price' => 'required',
        //     'color' => 'required',
        //     'size' => 'required',
        //     'stock' => 'required',
        // ]);


        $data = $request->input();
        $colors = $request->input('color', []);
        $sizes = $request->input('size', []);
        $stocks = $request->input('stock', []);
        $category = Category::where('category', $data['category'])->first()->id;


        Product::create([
            'title' => $data['title'],
            'description' => $data['desc'],
            'price' => $data['price'],
            'category' => $category
        ]);


        $variants = array_map(function ($color, $size, $stock) {
            return array(
                'color' => $color,
                'size' => $size,
                'stock' => $stock
            );
        }, $colors, $sizes, $stocks);


        $product_id = Product::get()->last()->id;
        foreach ($variants as $variant) {
            Color::updateOrInsert([
                'color' => $variant['color']
            ]);

            Size::updateOrInsert([
                'size' => $variant['size']
            ]);


            $color_id = Color::where('color', $variant['color'])->first()->id;
            $size_id = Size::where('size', $variant['size'])->first()->id;

            ProductVariant::create([
                'product_id' => $product_id,
                'color_id' => $color_id,
                'size_id' => $size_id,
                'stock' => $variant['stock']
            ]);
        }

        return redirect()->route('addproduct')->with('message', 'product added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($product_id)
    {
        $product = Product::find($product_id);
        $colors = ProductVariant::with('color')->where('product_id', $product->id)->get();
        $sizes = ProductVariant::with('size')->where('product_id', $product->id)->get();

        return view('pages.detail', ['product' => $product, 'colors' => $colors, 'sizes' => $sizes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
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
