@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">BA Staff Management</h6>
            <a href="{{ route('bastaffs.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">Add a new BA Staff</span>
                    <form method="POST" action="{{ route('bastaffs.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="ba_code">BA Code</label>
                            <input name="ba_code" type="text" class="form-control" id="ba_code"
                                aria-describedby="textHelp" placeholder="Enter New BA Code" value="{{ old('ba_code') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('ba_code') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="name">BA Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Enter New BA Name" value="{{ old('name') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="supervisor_id">Supervisor</label>
                            <select class="form-control" id="supervisor_id" name="supervisor_id">
                                <option selected value="">Choose the Supervisor</option>
                                @foreach ($supervisor as $row)
                                    <option {{ old('supervisor_id') ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('supervisor_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control" id="city_id" name="city_id">
                                <option selected value="">Choose the City</option>
                                @foreach ($city as $row)
                                    <option {{ old('city_id') ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('city_id') }} </div>
                        </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">&nbsp;</span>

                    <div class="form-group">
                        <label for="outlet_id">Outlet</label>
                        <select class="form-control" id="outlet_id" name="outlet_id">
                            <option selected value="">Choose the Outlet</option>
                            @foreach ($outlet as $row)
                                <option {{ old('outlet_id') ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('outlet_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="channel_id">Channel</label>
                        <select class="form-control" id="channel_id" name="channel_id">
                            <option selected value="">Choose the Channel</option>
                            @foreach ($channel as $row)
                                <option {{ old('channel_id') ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('channel_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="subchennel_id">Sub Channel</label>
                        <select class="form-control" id="subchennel_id" name="subchennel_id">
                            <option selected value="">Choose the Sub Channel</option>
                            @foreach ($subchannel as $row)
                                <option {{ old('subchennel_id') ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('subchennel_id') }} </div>
                    </div>

                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>


                    <div class="row">
                        <div class="col-lg-2">&nbsp;</div>
                        <button type="submit" class="btn btn-primary btn-block col-lg-10">Save</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
