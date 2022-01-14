@extends('layouts.front')
@section('title')
    Welcome to E-shop
@endsection

@section('content')
@include('layouts.frontinc.slider')

  <div class="container pt-5">
    <div class="row">
      <h1 class="d-flex justify-content-center">Featured Products</h1>
      <div class="owl-carousel owl-theme">
        @foreach ($featured_products as $product)
        <div class="item">
          <div class="card p-2 my-2">
            <img src="{{ asset('/assets/uploads/products/'.$product->image) }}" alt="product" height="250px">
            <div class="card-body">
              <h4>{{ $product->name }}</h4>
              <div class="d-flex justify-content-between">
                <p>${{ $product->selling_price }}</p>
                <span>$<s>{{ $product->original_price }}</s></span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="container py-5 mb-5">
    <div class="row">
      <h1 class="d-flex justify-content-center py-3">Trending Category</h1>
      <div class="owl-carousel owl-theme">
        @foreach ($trending_Category as $category)
        <div class="item">
          <a href="{{ url('view-category/'.$category->slug) }}">
            <div class="card p-2 my-2">
              <img src="{{ asset('/assets/uploads/category/'.$category->image) }}" alt="product" height="250px">
              <div class="card-body">
                <h4 class="d-flex justify-content-center pb-2">{{ $category->name }}</h4>
                <p>{{ $category->description }}</p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection




@section('script')
<script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection