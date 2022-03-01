@extends('layouts.front')
@section('title', $product->name)

@section('content')
    <div class="container py-5 my-5">
        <div class="breadcrumb d-flex align-items-center">
            <h6>Home > <a href="{{ url('/') }}">{{ $product->category->name }}</a> > {{ $product->name }} </h6>
        </div>
        <div class="row">
            <div class="col-md-12 my-4 d-flex justify-content-between">
                <div>
                    <a class="back-btn" href="{{ url('/category') }}">↢ Back</a>
                </div>
            </div>
        </div>
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('/assets/uploads/products/'.$product->image) }}" alt="product" class="w-100" height="360">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <h2>{{ $product->name }}</h2>
                            @if($product->trending == '1')
                                <h6 class="d-flex justify-content-center align-items-center px-3 bg-info">Trending</h6>
                            @endif
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Selling Price: <span>${{ $product->selling_price }}</span></p>
                            <p class="fw-bold">Original Price: <span><s>${{ $product->original_price }}</s></span></p>
                            <p></p>
                        </div>
                        <p>{{ $product->small_description }}</p>
                        <hr>
                        @if($product->quantity > 0)
                        <div class="d-flex">
                            <h6 class="d-flex justify-content-center align-items-center p-1 bg-success text-white">In Stock({{ $product->quantity }})</h6>
                        </div>
                        @else
                        <div class="d-flex">
                            <h6 class="d-flex justify-content-center align-items-center p-1 bg-success text-white">Out of Stock</h6>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $product->id }}" class="product_id">
                                <label for="quantity">Quantity</label>
                                <div class="input-grpup d-flex">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" disabled class="form-control w-50 quantity-input"/>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9 mt-4">
                                @if($product->quantity > 0)
                                <button type="submit" class="btn btn-primary mx-2 addToCartBtn"> <i class="fas fa-cart-arrow-down"></i> </button>
                                @endif
                                <button type="submit" class="btn btn-success"> <i class="far fa-heart"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
