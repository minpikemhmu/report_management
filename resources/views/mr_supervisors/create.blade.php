@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">MR Supervisor Management</h6>
            <a href="{{ route('mr_supervisors.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span class="">Add a new Supervisor</span>
                    <form method="POST" action="{{ route('mr_supervisors.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Supervisor Name" value="{{ old('name') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="code">Code</label>
                            <input name="code" type="text" class="form-control" id="code"
                                aria-describedby="textHelp" placeholder="Enter Code" value="{{ old('code') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('code') }} </div>
                        </div>

                        <!-- Password -->
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
                            <label for="executive_id">Executive</label>
                            <select class="form-control js-example-basic-single3" id="executive_id" name="executive_id">
                                <option selected value="">Choose the Executives</option>
                                @foreach ($executives as $row)
                                    <option {{ old('executive_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('executive_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <select class="form-control js-example-basic-single3" id="brand" name="brand">
                                <option selected value="">Choose Brand</option>
                                <option value="Nivea">Nivea</option>
                                <option value="Hansaplast">Hansaplast</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('brand') }} </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

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