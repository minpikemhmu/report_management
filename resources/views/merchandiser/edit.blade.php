@extends('template')
@section('content')
<div class="container">
      <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Merchandiser Management</h6>
            <a href="{{ route('merchandiser.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i> back</a>
      </div>
      <div class="card mx-auto mb-5 mt-3">
             <div class="row ml-3 mr-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">Edit Existing Merchandiser</span>
                    <form method="POST" action="{{route('merchandiser.update',$merchandiser->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="customer">Merchandiser name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="customer"
                            name="name"
                            value="{{$merchandiser->name}}"
                        />
                        <div class="form-control-feedback text-danger"> {{$errors->first('name') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="code">Merchandiser Code</label>
                        <input
                            type="text"
                            class="form-control"
                            id="code"
                            name="code"
                            value="{{$merchandiser->mer_code}}"
                        />
                        <div class="form-control-feedback text-danger"> {{$errors->first('code') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="region">Region</label>
                        <select
                            class="form-control"
                            id="region"
                            name="region"
                        >
                            <option selected value="">Select the Region</option>
                            @foreach($regions as $row)
                                <option value="{{$row->id}}" @if($merchandiser->region_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('region') }} </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">

                    <div class="form-group">
                        <label for="team">Merchandiser Team</label>
                        <select
                            class="form-control"
                            id="team"
                            name="team"
                        >
                            <option selected value="">Select the Merchandiser Team</option>
                            @foreach($teams as $row)
                                <option value="{{$row->id}}" @if($merchandiser->merchant_team_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('team') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="area">Merchandiser Area</label>
                        <select
                            class="form-control"
                            id="area"
                            name="area"
                        >
                            <option selected value="">Select the Merchandiser Area</option>
                            @foreach($areas as $row)
                                <option value="{{$row->id}}" @if($merchandiser->merchant_area_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('area') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <select
                            class="form-control"
                            id="channel"
                            name="channel"
                        >
                            <option selected value="">Select the Channel</option>
                            @foreach($channels as $row)
                                <option value="{{$row->id}}" @if($merchandiser->channel_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('channel') }} </div>
                    </div>

                    <button class="btn btn-primary mb-2" type="submit" >
                            update
                    </button>
                    </form>
                </div>
             </div>
      </div>
</div>
@endsection 