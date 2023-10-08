@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Fields Management</h6>
            <a href="{{ route('mr_input_fields.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">Add a new Field</span>
                    @if(session('custom_error'))
                        <div class="alert alert-danger">
                            {{ session('custom_error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('mr_input_fields.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="merchandiser_report_type_id">Merchandiser Report Type</label>
                            <select class="form-control js-example-basic-single1" id="merchandiser_report_type_id" name="merchandiser_report_type_id">
                                <option selected value="">Choose Report Type</option>
                                @foreach ($report_types as $row)
                                    <option {{ (int) old('merchandiser_report_type_id') === $row->id ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('merchandiser_report_type_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="display_name">Display Name</label>
                            <input name="display_name" type="text" class="form-control" id="display_name"
                                aria-describedby="textHelp" placeholder="Enter New Display Name" value="{{ old('display_name') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('display_name') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="display_order">Display Order</label>
                            <input name="display_order" type="number" class="form-control" id="display_order"
                                placeholder="Enter Display Order" value="{{ old('display_order') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('display_order') }} </div>
                        </div>

                        <div class="form-group">
                        <label for="field_type">Field Types</label>
                        <select class="form-control js-example-basic-single1" id="field_type" name="field_type">
                            <option selected value="">Choose Field Type</option>
                            <option {{ old('field_type') === "number_input" ? "selected" : "" }} value="number_input">number_input</option>
                            <option {{ old('field_type') === "text_input"? "selected" : "" }} value="text_input">text_input</option>
                            <option {{ old('field_type') === "file_input"? "selected" : "" }} value="file_input">file_input</option>
                            <option {{ old('field_type') === "list_input"? "selected" : "" }} value="list_input">list_input</option>
                            <option {{ old('field_type') === "radio_input"? "selected" : "" }} value="radio_input">radio_input</option>
                            <option {{ old('field_type') === "date_input"? "selected" : "" }} value="date_input">date_input</option>
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('field_type') }} </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">&nbsp;</span>

                    <div class="form-group">
                        <label for="isRequired">Is Required?</label>
                        <select class="form-control js-example-basic-single2" id="isRequired" name="isRequired">
                            <option selected value="">Choose One Option</option>
                            <option {{ old('isRequired') === "1" ? "selected" : "" }} value="1">Yes</option>
                            <option {{ old('isRequired') === "0" ? "selected" : "" }} value="0">No</option> 
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('isRequired') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="active_status">Active Status</label>
                        <select class="form-control js-example-basic-single3" id="active_status" name="active_status">
                            <option selected value="">Choose One Option</option>
                            <option {{ old('active_status') === "0" ? "selected" : "" }} value="0">Inactive</option>
                            <option {{ old('active_status') === "1" ? "selected" : "" }} value="1" selected>Active</option>
                        </select>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('active_status') }} </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="size">List Data</label>
                        <input name="size" type="text" class="form-control" id="size"
                            placeholder="Enter New Product Size" value="{{ old('size') }}">
                        <div class="form-control-feedback text-danger"> {{ $errors->first('size') }} </div>
                    </div> -->


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
