<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\Color;
use App\Models\Image;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDO;

class OrderController extends Controller
{

    // add to cart
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


    // create orders
    public function order(Request $request)
    {

        Order::create([
            'user_id' => $request->user()->id,
            'total_amount' => array_sum(array_column(session('cart'), 'subtotal')),
            'payment_method' => 'COD'
        ]);

        $order_id = Order::where('user_id', $request->user()->id)->get()->last()->id;

        foreach (session('cart') as $item) {
            Item::create([
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'product_name' => $item['title'],
                'size' => $item['size'],
                'color' => $item['color'],
                'unit_price' => $item['price'],
                'quantity' => $item['quantity']
            ]);
        }

        $items = Item::where('order_id', $order_id)->get();

        Mail::to($request->user())->send(new OrderPlaced($items));

        session()->forget('cart');

        return redirect()->route('myorders')
            ->with('orderSuccess', 'Order placed Successfully');
    }


    //my orders
    public function myorders(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)->get()->all();

        $items = array_map(function ($hello) {
            return Item::where('order_id', $hello->id)->get()->all();
        }, $orders);

        $products_id = [];

        foreach ($items as $item) {
            foreach ($item as $item2) {
                array_push($products_id, $item2['product_id']);
            }
        }

        $images = array_map(function ($product_id) {
            return Image::where('product_id', $product_id)->get()->first();
        }, $products_id);

        return view('pages.my_orders', [
            'orders' => $orders,
            'items' => $items,
            'images' => $images
        ]);
    } //my orders


    public function deleteCartItem(Request $request, $id)
    {
        session()->forget('cart.' . $id);
        return redirect()->route('cart');
    }
}
