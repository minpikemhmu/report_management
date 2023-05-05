@extends('template')
@section('content')
<div class="container">
      <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Customer Management</h6>
            <a href="{{ route('customers.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i> back</a>
      </div>
      <div class="card mx-auto mb-5 mt-3">
             <div class="row ml-3 mr-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">Add a new Customer</span>
                    <form method="POST" action="{{route('customers.store')}}">
                     @csrf
                    <div class="form-group">
                        <label for="customer">Customer Name</label>
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
                        <label for="id">Customer ID</label>
                        <input
                            type="text"
                            class="form-control"
                            id="id"
                            name="customer_id"
                            value="{{ old('customer_id') }}"
                        />
                        <div class="form-control-feedback text-danger"> {{$errors->first('customer_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input
                            type="text"
                            class="form-control"
                            id="address"
                            name="address"
                            value="{{ old('address') }}"
                        />
                        <div class="form-control-feedback text-danger"> {{$errors->first('address') }} </div>
                    </div>


                    <div class="form-group">
                        <label for="phonenumber">Mobile number</label>
                        <input
                            type="number"
                            class="form-control"
                            id="phonenumber"
                            name="phone_number"
                            value="{{ old('phone_number') }}"
                            placeholder="09*********"
                        />
                        <div class="form-control-feedback text-danger"> {{$errors->first('phone_number') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="total_frequency">Total Frequency</label>
                        <input
                            type="number"
                            class="form-control"
                            id="total_frequency"
                            name="total_frequency"
                            value="{{ old('total_frequency') }}"
                        />
                        <div class="form-control-feedback text-danger"> {{$errors->first('total_frequency') }} </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">

                    <div class="form-group">
                        <label for="customer_type">Customer Type</label>
                        <select
                            class="form-control"
                            id="customer_type"
                            name="customer_type"
                        >
                            <option selected value="">Select the Customer Type</option>
                            @foreach($customer_types as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('customer_type') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="division">Division</label>
                        <select
                            class="form-control selectedDivision"
                            id="division"
                            name="division"
                        >
                            <option selected value="">Select the division</option>
                            @foreach($divisions as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('division') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <select
                            class="form-control selectedCity"
                            id="city"
                            name="city"
                        >
                            <option selected value="">Select the City</option>
                            @foreach($cities as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('city') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="township">Township</label>
                        <select
                            class="form-control selectedTownship"
                            id="township"
                            name="township"
                        >
                            <option selected value="">Select the Township</option>
                            @foreach($townships as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('township') }} </div>
                    </div>

                    <button class="btn btn-primary mt-4" type="submit" >
                            create
                    </button>
                    </form>
                </div>
             </div>
      </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $(".selectedDivision").change(function(){
            var selected_division_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('getCityByDivision') }}",
                data: {
                    'division_id': selected_division_id,
                },
                type: 'GET',
                dataType: 'json',
                global: false,
                async: false,
                success: function(result) {
                    if (result) {
                        var html ="";
                        html+=`<option value="">Select the City</option>`
                        result.forEach(element => {
                            html+=`
                            <option value="${element.id}">${element.name}</option>
                            `
                        });
                        $(".selectedCity").html(html);
                    }
                }
            })
        })

        $(".selectedCity").change(function(){
            var selected_city_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('getTownshipByCity') }}",
                data: {
                    'city_id': selected_city_id,
                },
                type: 'GET',
                dataType: 'json',
                global: false,
                async: false,
                success: function(result) {
                    if (result) {
                        var html ="";
                        html+=`<option value="">Select the Township</option>`
                        result.forEach(element => {
                            html+=`
                            <option value="${element.id}">${element.name}</option>
                            `
                        });
                        $(".selectedTownship").html(html);
                    }
                }
            })
        })
    })
</script>
@endsection 