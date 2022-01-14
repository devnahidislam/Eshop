<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    public function frontIndex(){
        $featured_products = Product::where('trending','1')->take('10')->get();
        $trending_Category = Category::where('popular','1')->take('10')->get();
        return view('frontend.index', compact('featured_products','trending_Category'));
    }
    public function category(){
        $category = Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }
    public function viewCategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('category_id',$category->id)->where('status','0')->get();
            return view('frontend.product.index',compact('category','products'));
        }else{
            return redirect('/')->with('status','Slug not matshed');
        }
    }
}
