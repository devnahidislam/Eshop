<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class categoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $req){
        $this->validate($req,[
            'name' => 'required|min:4|max:100',
            'slug' => 'required|max:50',
            'description' => 'required|min:20',
            'meta_descrip' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->name = $req->name;
        $category->slug = $req->slug;
        $category->description = $req->description;
        $category->status = $req->status == TRUE ? '1':'0';
        $category->popular = $req->popular == TRUE ? '1':'0';
        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'.$ext;
            $file->move('assets\uploads\category', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $req->meta_title;
        $category->meta_descrip = $req->meta_descrip;
        $category->meta_keywords = $req->meta_keywords;
        //dd($category);
        $category->save();
        return redirect('/categories')->with('status','Category Added Successfully.');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $req, $id){
        $category = Category::find($id);
        $this->validate($req,[
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($req->hasFile('image')){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'.$ext;
            $file->move('assets\uploads\category', $filename);
            $category->image = $filename;
        }
        $category->name = $req->name;
        $category->slug = $req->slug;
        $category->description = $req->description;
        $category->status = $req->status == TRUE ? '1':'0';
        $category->popular = $req->popular == TRUE ? '1':'0';
        $category->meta_title = $req->meta_title;
        $category->meta_descrip = $req->meta_descrip;
        $category->meta_keywords = $req->meta_keywords;
        //dd($category);
        $category->update();
        return redirect('/categories')->with('status','Category Updated Successfully.');
    }

    public function delete($id){
        $category = Category::find($id);
        if($category->image){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('status','Category Updated Successfully.');
    }
}
