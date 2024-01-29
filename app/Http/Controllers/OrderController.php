<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addcart(Request $request, $id)
    {

        $product = Product::find($id);
        $cartItem = session('cart', []);
        $newItem = [
            'id' => $product['id'],
            'title' => $product['title'],
            'price' => $product['price'],
            'color' => $request->input('color'),
            'size' => $request->input('size')
        ];

        $cartItem[$id] = $newItem;

        session(['cart' => $cartItem]);

        return redirect(route('cart'));
    }

    public function deleteCartItem(Request $request, $id)
    {
        session()->forget('cart.' . $id);

        return redirect()->route('cart');
    }
}
