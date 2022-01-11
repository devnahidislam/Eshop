@extends('layouts.admin')

@section('content')
<div class="card">
  <a href="{{ url('products') }}" class="back-btn mx-2">↢</a>
  <div class="card-header d-flex justify-content-center">
    <h3>Edit & Update Product</h3>
  </div>
  <div class="card-body">
    <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        
        <div class="col-md-3">
          <label for="category_id">Product Category</label>
          <select name="category_id" class="form-select" aria-label="Default select example">
            <option value="0" >Choose Category</option>
            @foreach ($categories as $item)
            <option value="{{ $item->id }}" {{ ( $item->id == $products->category->id ) ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6 mb-2">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control @error('name')border-danger @enderror" value="{{ $products->name }}">
          @error('name')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-3 mb-2">
          <label for="slug">Slug</label>
          <input type="text" name="slug" class="form-control @error('slug')border-danger @enderror" value="{{ $products->slug }}">
          @error('slug')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-4 mb-2">
          <label for="small_description">Small Description</label>
          <textarea name="small_description" class="form-control @error('small_description')border-danger @enderror" rows="2" placeholder="Small Description"> {{ $products->small_description }}</textarea>
          @error('small_description')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-8 mb-2">
          <label for="description">Description</label>
          <textarea name="description" class="form-control @error('description') border-danger @enderror" rows="2" placeholder="Product Description"> {{ $products->description }}</textarea>
          @error('description')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-3 mb-2">
          <label for="original_price">Original Price</label>
          <input type="number" name="original_price" value="{{ $products->original_price }}" class="form-control @error('original_price') border-danger @enderror" rows="2" placeholder="Original Price">
          @error('original_price')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-3 mb-2">
          <label for="selling_price">Selling Price</label>
          <input type="number" name="selling_price" value="{{ $products->selling_price }}" class="form-control @error('selling_price') border-danger @enderror" rows="2" placeholder="Selling Price">
          @error('selling_price')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-3 mb-2">
          <label for="quantity">Quantity</label>
          <input type="number" name="quantity" value="{{ $products->quantity }}" class="form-control @error('quantity') border-danger @enderror" rows="2" placeholder="Products Quantity">
          @error('quantity')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-3 mb-2">
          <label for="tax">Tax</label>
          <input type="number" name="tax" value="{{ $products->tax }}" class="form-control @error('tax') border-danger @enderror" rows="2" placeholder="Tax">
          @error('tax')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-6 mb-2">
          <label for="status">Status : - </label>
          <input type="checkbox" name="status" {{ $products->status == '1' ? 'checked' :''}}>
        </div>
        <div class="col-md-6 mb-2">
          <label for="trending">Trending : - </label>
          <input type="checkbox" name="trending" {{ $products->trending == '1' ? 'checked' :''}}>
        </div>

        <div class="col-md-3 mb-2">
          <label for="meta_title">Meta Title</label>
          <textarea name="meta_title" class="form-control" rows="2">{{ $products->meta_title }}</textarea>
        </div>
        <div class="col-md-3 mb-2">
          <label for="meta_keywords">Meta Keywords</label>
          <textarea name="meta_keywords" class="form-control" rows="2">{{ $products->meta_keywords }}</textarea>
        </div>
        <div class="col-md-6 mb-2">
          <label for="meta_description">Meta Description</label>
          <textarea name="meta_description" class="form-control @error('meta_description') border-danger @enderror"" rows="2">{{ $products->meta_description }}</textarea>
          @error('meta_description')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-md-10 mb-1">
          <label for="image">Choose Products Image</label><br>
          <input type="file" name="image" multiple class="choose">
          @error('image')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-2">
          @if($products->image)
            <img src="\assets\uploads\products\{{ $products->image }}" alt="Product Image" height="100">
          @endif
        </div>
        <div class="col-md-12 d-flex justify-content-center">
          <button type="submit" class="px-6 btn btn-primary">Update</button>
        </div>

      </div>
    </form>
  </div>
</div>
@endsection