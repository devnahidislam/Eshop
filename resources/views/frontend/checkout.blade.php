@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
<div class="container py-3 mt-5">
  <div class="breadcrumb d-flex align-items-center">
    <h6>Home > Cart > Checkout </h6>
  </div>
  <div class="row">
      <div class="col-md-12 mb-2 d-flex justify-content-between">
          <div>
              <a class="back-btn" href="{{ url('/cart') }}">↢ Back</a>
          </div>
      </div>
  </div>
  <form action="{{ url('place-order') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-7">
        <div class="card shadow">
          <div class="card-body">
            <h5>Basic Details</h5>
            <hr>
            <div class="row checkout_form">
              <div class="col-md-6">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="form-control" value="{{ Auth::user()->name }}" placeholder="Enter First Name">
              </div>
              <div class="col-md-6">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="form-control" value="{{ Auth::user()->lname }}" placeholder="Enter Last Name" required >
              </div>
              <div class="col-md-6">
                <label for="email">Email :-</label>
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter Email">
              </div>
              <div class="col-md-6">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" placeholder="Enter Phone Number" required >
              </div>
              <div class="col-md-6">
                <label for="address_1">Address 1</label>
                <input type="text" name="address_1" class="form-control" value="{{ Auth::user()->address_1 }}" placeholder="Enter Address 1" required >
              </div>
              <div class="col-md-6">
                <label for="address_2">Address 2</label>
                <input type="text" name="address_2" class="form-control" value="{{ Auth::user()->address_2 }}" placeholder="Enter Address 2" required >
              </div>
              <div class="col-md-6">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}" placeholder="Enter City Name" required >
              </div>
              <div class="col-md-6">
                <label for="state">State</label>
                <input type="text" name="state" class="form-control" value="{{ Auth::user()->state }}" placeholder="Enter State" required >
              </div>
              <div class="col-md-6">
                <label for="country">Country</label>
                <input type="text" name="country" class="form-control" value="{{ Auth::user()->country }}" placeholder="Enter Country Name" required >
              </div>
              <div class="col-md-6">
                <label for="pincode">Pin Code</label>
                <input type="text" name="pincode" class="form-control" value="{{ Auth::user()->pincode }}" placeholder="Enter Pin Code" required >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card shadow">
          <div class="card-body">
            <h5>Order Details</h5>
            <hr>
            @php
              $total = 0;
            @endphp
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartItems as $item)
                  <tr>
                    <td>{{ $item->products->name }}</td>
                    <td>{{ $item->product_quantity }}</td>
                    <td>${{ $item->products->selling_price }}</td>
                  </tr>
                  @php
                      $total += $item->products->selling_price * $item->product_quantity;
                  @endphp
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <div class="total mx-4">
                <p class="mx-3">Total Price = ${{ $total }}</p>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <div>
                <button type="submit" class="btn btn-primary btn-sm" href="{{ url('/') }}">Place Order</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection