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
                    <span class="">Add a new Merchandiser</span>
                    <form method="POST" action="{{route('merchandiser.store')}}">
                     @csrf
                    <div class="form-group">
                        <label for="customer">Merchandiser name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="customer"
                            name="name"
                            value="{{ old('name') }}"
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
                            value="{{ old('code') }}"
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
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('region') }} </div>
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
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('channel') }} </div>
                    </div>
  
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">

                    <div class="form-group">
                        <label for="team">Merchandiser Team</label>
                        <select
                            class="form-control js-example-basic-single"
                            id="team"
                            name="team"
                        >
                            <option selected value="">Select the Merchandiser Team</option>
                            @foreach($teams as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('team') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="password" style="color: #212121">Password</label>
                        <div class="flx-h50-c-center">

                            <div class="input-group fg-if-width mr-3">
                                <input class="form-control py-3 bdr-gray br-8p fc-21" type="password" id="password"
                                    name="password" />
                                <div class="input-group-append">
                                    <span class="input-group-text btn_eye">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('password') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="area">Merchandiser Area</label>
                        <select
                            class="form-control js-example-basic-single1"
                            id="area"
                            name="area"
                        >
                            <option selected value="">Select the Merchandiser Area</option>
                            @foreach($areas as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('area') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="leader">Leader</label>
                        <select
                            class="form-control js-example-basic-single1"
                            id="leader"
                            name="leader"
                        >
                            <option selected value="">Select the Leader</option>
                            @foreach($leaders as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('leader') }} </div>
                    </div>


                    <button class="btn btn-primary my-4" type="submit" >
                            create
                    </button>
                    </form>
                </div>
             </div>
      </div>
</div>
@endsection 
@push('script2')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-single1').select2();

        });
    </script>
@endpush