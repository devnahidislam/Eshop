<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function add(){
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    public function insert(Request $req){
        $this->validate($req,[
            'category_id' => 'required|not_in:0',
            'name' => 'required|min:4|max:100',
            'slug' => 'required|max:50',
            'description' => 'required|min:20',
            'meta_description' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $products = new Product();
        $products->category_id = $req->category_id;
        $products->name = $req->name;
        $products->slug = $req->slug;
        $products->small_description = $req->small_description;
        $products->description = $req->description;
        $products->original_price = $req->original_price;
        $products->selling_price = $req->selling_price;

        $products->quantity = $req->quantity;
        $products->tax = $req->tax;
        $products->status = $req->status == TRUE ? '1':'0';
        $products->trending = $req->trending == TRUE ? '1':'0';
        $products->meta_title = $req->meta_title;
        $products->meta_keywords = $req->meta_keywords;
        $products->meta_description = $req->meta_description;
        
        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'.$ext;
            $file->move('assets\uploads\products', $filename);
            $products->image = $filename;
        }
        //dd($products);
        $products->save();
        return redirect('/products')->with('status','Product Added Successfully.');
    }

    public function edit($id){
        $categories = Category::all();
        $products = Product::find($id);
        return view('admin.products.edit', compact('products','categories'));
    }

    public function update(Request $req, $id){
        $products = Product::find($id);
        $this->validate($req,[
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($req->hasFile('image')){
            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'.$ext;
            $file->move('assets\uploads\products', $filename);
            $products->image = $filename;
        }

        $products->category_id = $req->category_id;
        $products->name = $req->name;
        $products->slug = $req->slug;
        $products->small_description = $req->small_description;
        $products->description = $req->description;
        $products->original_price = $req->original_price;
        $products->selling_price = $req->selling_price;
        $products->quantity = $req->quantity;
        $products->tax = $req->tax;
        $products->status = $req->status == TRUE ? '1':'0';
        $products->trending = $req->trending == TRUE ? '1':'0';
        $products->meta_title = $req->meta_title;
        $products->meta_keywords = $req->meta_keywords;
        $products->meta_description = $req->meta_description;
        //dd($products);
        $products->update();
        return redirect('/products')->with('status','Product Updated Successfully.');
    }

    public function delete($id){
        $products = Product::find($id);
        if($products->image){
            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('/products')->with('status','Product Deleted Successfully.');
    }
    
}
