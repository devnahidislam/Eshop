
@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
<div class="container py-5 mt-4">
  <div class="row">
    <div class="col-md-12 mb-3 d-flex justify-content-between">
        <div>
            <a class="back-btn" href="{{ url('/my-order') }}">↢ Back</a>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          My Orders
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
            <h4>Shipping Details</h4> <hr>
              <label for="">First Name</label>
              <div class="border p-2">{{ $orders->fname }}</div>
              <label for="">Last Name</label>
              <div class="border p-2">{{ $orders->lname }}</div>
              <label for="">Email</label>
              <div class="border p-2">{{ $orders->email }}</div>
              <label for="">Shipping Address</label>
              <div class="border p-2">
                <i class="fas fa-map-marker-alt"></i>
                {{ $orders->address_1 }}
                {{ $orders->address_2 }},
                {{ $orders->city }},
                {{ $orders->state }},
                {{ $orders->country }}
              </div>
              <label for="">Pin Code</label>
              <div class="border p-2">{{ $orders->pincode }}</div>
            </div>
            <div class="col-md-6">
            <h4>Order Details</h4> <hr>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders->orderItems as $item)
                    <tr>
                      <td>{{ $item->products->name }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td>${{ $item->price }}</td>
                      <td><img src="{{ asset('/assets/uploads/products/'.$item->products->image) }}" alt="product" height="50px"></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <h5>Total Price:- ${{ $orders->total_price }}</h5>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection