<?php

namespace App\Http\Controllers;

use App\Events\NewProduct;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $images = Image::all();

        // dump($images);
        return view('pages.shop', [
            'products' => $products,
            'images' => $images
        ]);
    }

    public function productlist()
    {
        $products = Product::all();
        $stock = ProductVariant::all();
        $images = Image::all();

        return view('admin.product_list', [
            'products' => $products,
            'stocks' => $stock,
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function addproduct()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.add_product', ['categories' => $categories, 'colors' => $colors, 'sizes' => $sizes]);
    }

    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'category' => 'required',
            'price' => 'required',
            'images' => 'required',
            'images.*' => 'required|mimes:jpeg,png,jpg|max:2048',
            'color.*' => 'required',
            'size.*' => 'required',
            'stock.*' => 'required'
        ], [
            'images.required' => 'Please choose an image.',
            'images.*.mimes' => 'The image field must be a file of type: jpeg, png, jpg.',
            'images.*.max' => 'The image should not exceed 2mb',
        ]);

        $product = Product::create($data);

        $variants = array_map(function ($color, $size, $stock) {
            return array(
                'color' => $color,
                'size' => $size,
                'stock' => $stock
            );
        }, $data['color'], $data['size'], $data['stock']);

        $product_id = $product->id;

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

        foreach ($data['images'] as $image) {
            //store to public folder
            $file_name = time() . $image->getClientOriginalName();
            $path =  public_path() . '/product_images';
            $image->move($path,  $file_name);

            Image::create([
                'product_id' => $product_id,
                'image_path' => $file_name
            ]);

            //store storage folder
            // $path = Storage::putFile('product_images', $image);

        }

        event(new NewProduct());

        return redirect()->route('addproduct')->with('message', 'product added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($product_id)
    {
        $product = Product::find($product_id);
        $images = Image::where('product_id', $product_id)->get();
        $colors = ProductVariant::with('color')->where('product_id', $product->id)->get()->unique('color.id');
        $sizes = ProductVariant::with('size')->where('product_id', $product->id)->get()->unique('size.id');

        return view('pages.detail', [
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'images' => $images
        ]);
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
        Product::find($product->id)->delete();

        return redirect()->route('productlist')->with('success', 'Product deleted successfully');
    }
}
