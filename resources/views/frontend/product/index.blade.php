@extends('layouts.front')
@section('title')
    {{ $category->name }}
@endsection
@section('content')
    <div class="container py-5 mb-5">
        <div class="row">
            <div class="col-md-12 my-5 d-flex justify-content-between">
                <div>
                    <a class="back-btn" href="{{ url('/category') }}">↢ Back</a>
                </div>
                <h1>{{ $category->name }}</h1>
                <div></div>
            </div>
            @foreach ($products as $product)
                <div class="item col-md-3 mb-3">
                    <a href="{{ url('category/' . $category->slug . '/' . $product->slug) }}">
                        <div class="card p-2 my-2">
                            <img src="{{ asset('/assets/uploads/products/' . $product->image) }}" alt="product"
                                height="250px">
                            <div class="card-body">
                                <h4 class="d-flex justify-content-center pb-2">{{ $product->name }}</h4>
                                <p>{{ $product->small_description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
