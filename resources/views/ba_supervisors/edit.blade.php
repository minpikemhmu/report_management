@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Supervisor Management</h6>
            <a href="{{ route('ba_supervisors.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span class="">Edit Existing Supervisor</span>
                    <form method="POST" action="{{ route('ba_supervisors.update', $supervisor->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Supervisor Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Enter and Supervisor to edit" value="{{ old('name', $supervisor->name ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="region_id">Region</label>
                            <select class="form-control js-example-basic-single3" id="region_id" name="region_id">
                                <option selected value="">Choose the Region</option>
                                @foreach ($regions as $row)
                                    <option {{ $supervisor->region_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('region_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="executive_id">Executive</label>
                            <select class="form-control js-example-basic-single3" id="executive_id" name="executive_id">
                                <option selected value="">Choose the Executives</option>
                                @foreach ($executives as $row)
                                    <option {{ $supervisor->executive_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('executive_id') }} </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection
