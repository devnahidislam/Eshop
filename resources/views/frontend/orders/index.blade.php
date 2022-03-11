
@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
<div class="container py-5 mt-4">
  <div class="row">
    <div class="col-md-12 mb-4 d-flex justify-content-between">
        <div>
            <a class="back-btn" href="{{ url('/') }}">↢ Back</a>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <h3 class="card-header">
          My Orders
        </h3>
        <div class="card-body">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Tracking Number</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                <tr>
                  <td>{{ $order->tracking_no }}</td>
                  <td>${{ $order->total_price }}</td>
                  <td>{{ $order->status == '0' ? "Pending" : "Completed"}}</td>
                  <td class="align-item-right">
                    <a href="{{ url('view-order/'.$order->id) }}" class="btn btn-primary btn-sm">View</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection