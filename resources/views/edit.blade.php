
@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit 
                        <a href="{{ url('tableview') }}" class="btn btn-info float-end">GoBack</a>
                        </h4>

                    </div>

                    <div class="card-body">

                        <form action="{{ url('/updatetable/'. $User->id)}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$User->name}}" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{$User->email}}" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="update" name="update" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
