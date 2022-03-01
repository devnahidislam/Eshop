<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function addToCart(Request $req){
        $product_id = $req->input('product_id');
        $product_quantity = $req->input('product_quantity');
        if(Auth::check()){
            $product_check = Product::where('id', $product_id)->first();
            if($product_check){
                if(Cart::where('product_id', $product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status' => $product_check->name .' Already Added to Cart.']);
                }else{
                    $cartItem = new Cart();
                    $cartItem -> user_id = Auth::id();
                    $cartItem -> product_id = $product_id;
                    $cartItem -> product_quantity = $product_quantity;
                    $cartItem -> save();
                    return response()->json(['status' => $product_check->name .' Added to Cart Successfully']);
                }
            }
        }else{
            return response()->json(['status' => 'Please Login before Add To Cart.']);
        }
    }

    public function viewCart(){
        $cartItem = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItem'));
    }

    public function updateCart(Request $req){
        $product_id = $req->input('product_id');
        $product_qty = $req->input('product_quantity');
        if(Cart::where('product_id', $product_id)->where('user_id',Auth::id())->exists()){
            $cart = Cart::where('product_id', $product_id)->where('user_id',Auth::id())->first();
            $cart -> product_quantity = $product_qty;
            $cart -> update();
        }
    }

    public function deleteCartItem(Request $req){
        $product_id = $req->input('product_id');
        if(Cart::where('product_id', $product_id)->where('user_id',Auth::id())->exists()){
            $cartItem = Cart::where('product_id', $product_id)->where('user_id',Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' => 'Item has been removed.']);
        }
    }
}
