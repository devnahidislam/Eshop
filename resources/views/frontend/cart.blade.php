@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="container py-3 my-5">
        <div class="breadcrumb d-flex align-items-center">
            <h6>Home > Cart </h6>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2 d-flex justify-content-between">
                <div>
                    <a class="back-btn" href="{{ url('/category') }}">↢ Back</a>
                </div>
            </div>
        </div>
        @php
            $total = 0;
        @endphp
        @foreach ($cartItem as $item)
            <div class="card shadow my-3 product_data">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-1">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="product"
                                class="w-100" height="80">
                        </div>
                        <div class="col-md-2">
                            <h5 class="mt-4">{{ $item->products->name }}</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="mt-4">{{ $item->products->small_description }}</p>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $item->products->id }}" class="product_id">
                            <label for="quantity">Quantity</label>
                            <div class="input-grpup d-flex">
                                <button class="input-group-text decrement-btn changeQuantity">-</button>
                                <input type="text" name="quantity" value="{{ $item->product_quantity }}" disabled
                                    class="form-control w-25 quantity-input" />
                                <button class="input-group-text increment-btn changeQuantity">+</button>
                            </div>
                            @php
                                $total += $item->products->selling_price * $item->product_quantity;
                            @endphp
                            @if ($item->products->quantity < $item->product_quantity)
                                <p class="d-flex justify-content-center align-items-center p-1 mt-1 bg-warning">Stock
                                {{ $item->products->quantity }} pis, less -{{ $item->product_quantity - $item->products->quantity }}</p>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <p class="mt-4">Price: ${{ $item->products->selling_price }}</p>
                        </div>
                        <div class="col-md-1">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-danger delete_cart_item mt-4"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if ($total != 0)
            <div class="d-flex justify-content-end">
                <h5 class="mx-3 mt-2">Total Price: ${{ $total }}</h5>
                <a href="{{ url('/checkout') }}" class="btn btn-outline-info px-4">Checkout</a>
            </div>
        @else
            <div class="card shadow mt-2 p-4">
                <div class="card-body d-flex justify-content-center">
                    <h2 class="mx-5 mt-2">Your <i class="fas fa-cart-arrow-down"></i>Cart is Empty !</h2>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-outline-info" href="{{ url('/category') }}">
                        Continue Shopping
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
