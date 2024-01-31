<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Image;
use App\Models\Item;
use App\Models\Order;
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
            'size' => $request->input('size'),
            'quantity' => $request->input('quantity'),
            'image' => Image::where('product_id', $id)->get('image_path')->first(),
            'subtotal' => $product['price'] * $request->input('quantity')
        ];

        $cartItem[time()] = $newItem;

        session(['cart' => $cartItem]);
        return redirect(route('cart'));
    }


    public function order(Request $request)
    {

        Order::create([
            'user_id' => $request->user()->id,
            'total_amount' => array_sum(array_column(session('cart'), 'subtotal')),
            'payment_method' => 'COD'
        ]);

        foreach (session('cart') as $item) {
            Item::create([
                'order_id' => Order::where('user_id', $request->user()->id)->get()->last()->id,
                'product_id' => $item['id'],
                'product_name' => $item['title'],
                'size' => $item['size'],
                'color' => $item['color'],
                'unit_price' => $item['price'],
                'quantity' => $item['quantity']
            ]);

            // dump([
            //     'order_id' => Order::where('user_id', $request->user()->id)->get()->last()->id,
            //     'product_id' => $item['id'],
            //     'product_name' => $item['title'],
            //     'size' => $item['size'],
            //     'color' => $item['color'],
            //     'unit_price' => $item['price'],
            //     'quantity' => $item['quantity']
            // ]);
        }

        session()->forget('cart');

        return redirect()->route('cart');
    }


    public function deleteCartItem(Request $request, $id)
    {
        session()->forget('cart.' . $id);
        return redirect()->route('cart');
    }
}
