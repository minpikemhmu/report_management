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
                        <input name="id" type="hidden" value="{{$supervisor->id}}">
                        <div class="form-group">
                            <label for="name">Supervisor Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Enter and Supervisor to edit" value="{{ old('name', $supervisor->name ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="code">Code</label>
                            <input name="code" type="text" class="form-control" id="code"
                                aria-describedby="textHelp" placeholder="Edit Code"
                                value="{{ old('code', $supervisor->code ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('code') }} </div>
                        </div>

                         <!-- Password -->
                         <div class="form-group">
                            <label for="password" style="color: #212121">Password</label>
                            <div class="flx-h50-c-center">

                                <div class="input-group fg-if-width mr-3">
                                    <input class="form-control py-3 bdr-gray br-8p fc-21" type="password" id="password"
                                        name="password" placeholder="Click here to give new password"/>
                                        {{-- value="{{ old('password', $supervisor->password ?? '') }} --}}
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

@push('script2')
    <script>
        $(document).ready(function() {
            $('.btn_eye').click(function() {
                var x = document.getElementById("password");

                var show_eye = document.getElementById("show_eye");
                var hide_eye = document.getElementById("hide_eye");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
            })
        });
    </script>
@endpush
