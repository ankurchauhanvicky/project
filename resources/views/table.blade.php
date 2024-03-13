@extends('layouts.main')
@section('content')

@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif


@if (session('status_msg'))
<div class="alert alert-danger">
  {{ session('status_msg') }}
</div>
@endif

<div class="container">
  <div class="card">
    <div class="card-body">

      <a href="" class="btn btn-info float-end" >AddNew</a>
      <div class="container mt-3">
        <h3>TableShow</h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @if(count($User)> 0)
            @foreach ($User as $data)
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->email }}</td>
              <td colsapn="4"> <a href="{{ url('/edittable/'. $data->id) }}"><button class="btn btn-primary">Edit</button>
                  <a onclick="return confirm('Are you sure user delete?')" href="{{ url('/deletetable/'. $data->id) }}"><button class="btn btn-danger">Delete</button></i></a>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="4">No data found</td>
            </tr>
            @endif

          </tbody>
        </table>

        {{$User->links('pagination::bootstrap->')}}
      </div>
    </div>
  </div>
</div>

@endsection

