<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function index() {
        $oldCartItems = Cart::where('user_id', Auth::id())->get();

        foreach($oldCartItems as $item) {
            if(!Product::where('id', $item->product_id)->where('quantity', '>=', $item->product_quantity)->exists()){
               $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
               $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }

    public function placeOrder(Request $req) {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $req->fname;
        $order->lname = $req->lname;
        $order->email = $req->email;
        $order->phone = $req->phone;
        $order->address_1 = $req->address_1;
        $order->address_2 = $req->address_2;
        $order->city = $req->city;
        $order->state = $req->state;
        $order->country = $req->country;
        $order->pincode = $req->pincode;
        // Total price of carts products
        $total = 0;
        $cartsItems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartsItems_total as $product) {
            $total += $product->products->selling_price;
        }
        $order->total_price = $total;
        // $order->status = $req->status;
        // $order->message = $req->message;
        $order->tracking_no = 'nin'.rand(1111,9999);
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->product_quantity,
                'price' => $item->products->selling_price,
            ]);
            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->product_quantity;
            $product->update();
        }

        if(Auth::user()->address_1 == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $req->fname;
            $user->lname = $req->lname;
            $user->phone = $req->phone;
            $user->address_1 = $req->address_1;
            $user->address_2 = $req->address_2;
            $user->city = $req->city;
            $user->state = $req->state;
            $user->country = $req->country;
            $user->pincode = $req->pincode;
            $user->update();
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status','Order Placed Successfully');
    }
}
