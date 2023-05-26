@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">BA Assign Management</h6>
            <a href="{{ route('assignBa.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">Add a BA Assign</span>
                    <form method="POST" action="{{ route('assignBa.store') }}">
                        @csrf
                        {{-- 'ba_staff_id' => 'required|exists:ba_staffs,id',
                        'product_key_category_id' => 'required|exists:product_key_categories,id',
                        'target_quantity' => 'required|numeric',
                        'month' => 'required|integer|between:1,12',
                        'year' => 'required|integer|digits:4', --}}
                        <div class="form-group">
                            <label for="ba_staff_id">BA Staff</label>
                            <select class="form-control js-example-basic-single" id="ba_staff_id" name="ba_staff_id">
                                <option selected value="">Choose the BA Staff</option>
                                @foreach ($baStaffs as $row)
                                    <option {{ old('ba_staff_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('ba_staff_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="product_key_category_id">Product Key Category</label>
                            <select class="form-control js-example-basic-single1" id="product_key_category_id" name="product_key_category_id">
                                <option selected value="">Choose the Product Key Category</option>
                                @foreach ($productKeyCategories as $row)
                                    <option {{ old('product_key_category_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('product_key_category_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="target_quantity">Target Amount</label>
                            <input name="target_quantity" type="text" class="form-control" id="target_quantity"
                                aria-describedby="textHelp" placeholder="Enter the Target Amount" value="{{ old('target_quantity') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('target_quantity') }} </div>
                        </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">&nbsp;</span>

                    <div class="form-group">
                        <label for="month">Month</label>
                        <select class="form-control js-example-basic-single2" id="month" name="month">
                            <option value="">Select Month</option>
                            @for ($month = 1; $month <= 12; $month++)
                                <option value="{{ $month }}" {{ old('month') == $month ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                </option>
                            @endfor
                        </select>
                        <div class="form-control-feedback text-danger">{{ $errors->first('month') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input name="year" type="number" class="form-control" id="year" placeholder="Enter the Year" value="{{ old('year') }}">
                        <div class="form-control-feedback text-danger">{{ $errors->first('year') }}</div>
                    </div>
                    

                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>

                    <div class="row">
                        <div class="col-lg-2">&nbsp;</div>
                        <button type="submit" class="btn btn-primary btn-block col-lg-10">Save the Assign</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-single1').select2();
            $('.js-example-basic-single2').select2();
            $('.js-example-basic-single3').select2();
        });
    </script>
@endsection
