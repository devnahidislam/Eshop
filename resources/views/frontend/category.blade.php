
@extends('layouts.front')
@section('title')
  Category
@endsection
@section('content')
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-md-12 my-5 d-flex justify-content-between align-items-center">
        <div>
          <a class="back-btn" href="{{ url('/') }}">↢ Back</a>
        </div>
        <h1>Trending Category</h1>
        <div></div>
      </div>
      <div class="col-md-12">
        <div class="row">
          @foreach ($category as $cateItem)
          <div class="col-md-3">
            <div class="item">
              <a href="{{ url('view-category/'.$cateItem->slug) }}">
                <div class="card p-2 my-2">
                  <img src="{{ asset('/assets/uploads/category/'.$cateItem->image) }}" alt="product" height="250px">
                  <div class="card-body">
                    <h4 class="d-flex justify-content-center pb-2">{{ $cateItem->name }}</h4>
                    <p>{{ $cateItem->description }}</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
            
          @endforeach
        </div>
      </div>
    </div>
  </div>
  
@endsection