@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="col-md-12 my-5 d-flex justify-content-between align-items-center">
    <div>
      <a class="back-btn" href="{{ url('categories') }}">↢ Back</a>
    </div>
    <h1>Edit & Update Category</h1>
    <div></div>
  </div>
  <div class="card-body">
    <form action="{{ url('update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6 mb-2">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{ $category->name }}" class="form-control" >
        </div>
        <div class="col-md-6 mb-2">
          <label for="slug">Slug</label>
          <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" >
        </div>
        <div class="col-md-12 mb-2">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" rows="4">{{ $category->description }}</textarea>
        </div>
        <div class="col-md-6 mb-2">
          <label for="status">Status : - </label>
          <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked' :''}}>
        </div>
        <div class="col-md-6 mb-2">
          <label for="popular">Popular : - </label>
          <input type="checkbox" name="popular" {{ $category->popular == 1 ? 'checked' :''}}>
        </div>
        <div class="col-md-12 mb-2">
          <label for="meta_title">Meta Title</label>
          <textarea name="meta_title" class="form-control" rows="3">{{ $category->meta_title }}</textarea>
        </div>
        <div class="col-md-12 mb-2">
          <label for="meta_descrip">Meta Description</label>
          <textarea name="meta_descrip" class="form-control" rows="3">{{ $category->meta_descrip }}</textarea>
        </div>
        <div class="col-md-12 mb-2">
          <label for="meta_keywords">Meta Keywords</label>
          <textarea name="meta_keywords" class="form-control" rows="3">{{ $category->meta_keywords }}</textarea>
        </div>
        <div class="col-md-8 mb-2">
          <label for="image">Choose an Image</label>
          <input type="file" name="image" value="{{ $category->image }}" class="form-control">
          @error('image')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-4">
          @if($category->image)
            <img src="\assets\uploads\category\{{ $category->image }}" alt="Category Image" height="100">
          @endif
        </div>
        
        <div class="col-md-12 mt-5 d-flex justify-content-center">
          <button type="submit" class="px-6 btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection