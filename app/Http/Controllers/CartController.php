<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $post = Post::find($id);
    
        if (!$post) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }
    
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'title' => $post->title,
                'quantity' => 1,
                'price' => $post->price,
                'image' => $post->image,
            ];
        }
    
        session()->put('cart', $cart);
    
        return response()->json(['success' => 'Sản phẩm đã được thêm vào giỏ hàng', 'cart' => $cart]);
    }
    


    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật');
        }
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
        }
    }

    public function placeOrderSession(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $orders = session()->get('orders', []);
        $orderData = [
            'order_id' => uniqid('order_'),
            'items' => $cart,
            'total' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
            'created_at' => now()->toDateTimeString()
        ];
        $orders[] = $orderData;
        session()->put('orders', $orders);

        session()->forget('cart');

        return redirect()->route('orders.show')->with('success', 'Đơn hàng đã được đặt thành công!');
    }

    public function showOrders()
    {
        $orders = session()->get('orders', []);
        return view('orders', compact('orders'));
    }

    public function showOrderDetails($id)
{
    $orders = session()->get('orders', []);
    $order = collect($orders)->firstWhere('order_id', $id);

    if (!$order) {
        return redirect()->route('orders.show')->with('error', 'Đơn hàng không tồn tại.');
    }

    return view('order-details', compact('order'));
}

}
