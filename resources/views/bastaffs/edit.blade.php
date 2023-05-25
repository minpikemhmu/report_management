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
                    <span class="">Edit Existing BA Staff</span>
                    <form method="POST" action="{{ route('bastaffs.update', $baStaff) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="ba_code">BA Code</label>
                            <input name="ba_code" type="text" class="form-control" id="ba_code"
                                aria-describedby="textHelp" placeholder="Edit the BA Code"
                                value="{{ old('ba_code', $baStaff->ba_code ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('ba_code') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="name">BA Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Enter New BA Name" value="{{ old('name', $baStaff->name ?? '') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('name') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="supervisor_id">Supervisor</label>
                            <select class="form-control js-example-basic-single" id="supervisor_id" name="supervisor_id">

                                <option {{ !$baStaff->supervisor_id ? 'selected' : '' }} value="">Choose the
                                    Supervisor</option>
                                @foreach ($supervisor as $row)
                                    <option {{ $baStaff->supervisor_id == $row->id ? 'selected' : '' }}
                                        value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('supervisor_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control js-example-basic-single1" id="city_id" name="city_id">
                                <option {{ !$baStaff->city_id ? 'selected' : '' }} value="">Choose the City</option>
                                @foreach ($city as $row)
                                    <option {{ $baStaff->city_id == $row->id ? 'selected' : '' }}
                                        value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('city_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="product_brand_id">Product Brand</label>
                            <select class="form-control js-example-basic-single2" id="product_brand_id" name="product_brand_id">
                                <option {{ !$baStaff->product_brand_id ? 'selected' : '' }} value="">Choose the Product Brand
                                </option>
                                @foreach ($productBrands as $row)
                                    <option {{ $baStaff->product_brand_id == $row->id ? 'selected' : '' }}
                                        value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('product_brand_id') }} </div>
                        </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">&nbsp;</span>

                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        <select class="form-control js-example-basic-single2" id="customer_id" name="customer_id">
                            <option {{ !$baStaff->customer_id ? 'selected' : '' }} value="">Choose the Customer
                            </option>
                            @foreach ($customers as $row)
                                <option {{ $baStaff->customer_id == $row->id ? 'selected' : '' }}
                                    value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('customer_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="channel_id">Channel</label>
                        <select class="form-control" id="channel_id" name="channel_id">
                            <option {{ !$baStaff->channel_id ? 'selected' : '' }} value="">Choose the Channel
                            </option>
                            @foreach ($channel as $row)
                                <option {{ $baStaff->channel_id == $row->id ? 'selected' : '' }}
                                    value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('channel_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="subchannel_id">Sub Channel</label>
                        <select class="form-control js-example-basic-single3" id="subchannel_id" name="subchannel_id">
                            <option {{ !$baStaff->subchannel_id ? 'selected' : '' }} value="">Choose the Sub Channel
                            </option>
                            @foreach ($subchannel as $row)
                                <option {{ $baStaff->subchannel_id == $row->id ? 'selected' : '' }}
                                    value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('subchannel_id') }} </div>
                    </div>

                    <div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" style="color: #212121">Password</label>
                            <div class="flx-h50-c-center">

                                <div class="input-group fg-if-width mr-3">
                                    <input class="form-control py-3 bdr-gray br-8p fc-21" type="password" id="password"
                                        name="password" placeholder="Click here to give new password"/>
                                        {{-- value="{{ old('password', $baStaff->password ?? '') }} --}}
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
                    </div>

                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>


                    <div class="row">
                        <div class="col-lg-2">&nbsp;</div>
                        <button type="submit" class="btn btn-primary btn-block col-lg-10">Update</button>
                    </div>

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
            $('.js-example-basic-single2').select2();
            $('.js-example-basic-single3').select2();

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
