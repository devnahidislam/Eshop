@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-center">
    <h3>Add Category</h3>
  </div>
  <div class="card-body">
    <form action="{{ url('add-category') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-2">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control @error('name')border-danger @enderror" placeholder="Category Name" required>

          @error('name')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-6 mb-2">
          <label for="slug">Slug</label>
          <input type="text" name="slug" class="form-control @error('slug')border-danger @enderror"" placeholder="Category Slug" required>
          @error('slug')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 mb-2">
          <label for="description">Description</label>
          <textarea name="description" class="form-control @error('description')border-danger @enderror"" rows="4" placeholder="Category Description" required></textarea>
          @error('description')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-6 mb-2">
          <label for="status">Status : - </label>
          <input type="checkbox" name="status">
        </div>
        <div class="col-md-6 mb-2">
          <label for="popular">Popular : - </label>
          <input type="checkbox" name="popular">
        </div>
        <div class="col-md-12 mb-2">
          <label for="meta_title">Meta Title</label>
          <textarea name="meta_title" class="form-control" rows="3" placeholder="Meta Title" required></textarea>
        </div>
        <div class="col-md-12 mb-2">
          <label for="meta_descrip">Meta Description</label>
          <textarea name="meta_descrip" class="form-control @error('meta_descrip')border-danger @enderror"" rows="3" placeholder="Meta Description" required></textarea>
          @error('meta_descript')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 mb-2">
          <label for="meta_keywords">Meta Keywords</label>
          <textarea name="meta_keywords" class="form-control" rows="3" placeholder="Meta Keyword"></textarea>
        </div>
        <div class="col-md-12 mb-1">
          <label for="image">Choose Products Image</label><br>
          <input type="file" name="image" multiple class="choose">
          @error('image')
            <div class="text-danger mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 d-flex justify-content-center">
          <button type="submit" class="px-6 btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection