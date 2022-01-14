@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="col-md-12 my-5 d-flex justify-content-between align-items-center">
    <div>
      <a class="back-btn" href="{{ url('/dashboard') }}">↢ Back</a>
    </div>
    <h1>Category Page</h1>
    <div></div>
  </div>
  <div class="card-body">
    <table class="table-content">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Image</th>
          <th>Description</th>
          <th>Edit</th>
          <th>Delet</th>
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
              <a href="{{ url('/edit-category/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
            </td>
            <td>
              <a  href="{{ url('/delete-category/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection