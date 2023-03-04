@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Outlet Management</h6>
            <a href="{{ route('outlets.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span class="">Add a new Outlet</span>
                    <form method="POST" action="{{ route('outlets.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="outlet_id">Outlet ID</label>
                            <input name="outlet_id" type="text" class="form-control" id="outlet_id"
                                aria-describedby="textHelp" placeholder="Enter New Outlet ID" value="{{ old('outlet_id') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('outlet_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Outlet Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Outlet Name" value="{{ old('name') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </div>
    </div>
@endsection
