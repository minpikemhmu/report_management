@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">MR Leader Management</h6>
            <a href="{{ route('mr_leaders.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span class="">Add a new Leader</span>
                    <form method="POST" action="{{ route('mr_leaders.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Leader Name" value="{{ old('name') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>


                        <div class="form-group">
                            <label for="supervisor_id">Executive</label>
                            <select class="form-control js-example-basic-single3" id="supervisor_id" name="supervisor_id">
                                <option selected value="">Choose the Supervisor</option>
                                @foreach ($supervisors as $row)
                                    <option {{ old('subchannel_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('supervisor_id') }} </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </div>
    </div>
@endsection
