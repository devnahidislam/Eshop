@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-head">
    <h1 class="d-flex justify-content-center">Category page</h1>
    <a href="{{ url('add-category') }}" class="btn btn-info btn-sm ml-auto mx-4">Add Category</a>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Image</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($category as $item )
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td class=" d-flex justify-content-center">
              <img src="assets\uploads\category\{{ $item->image }}" alt="Category Image" class="img-responsive" width="100" height="100">
            </td>
            <td>{{ $item->description }}</td>
            <td>
              <a href="{{ url('/edit-category/'.$item->id) }}" class="btn btn-primary">Edit</a>
              <a  href="{{ url('/delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection