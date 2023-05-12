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
                    <span class="">Edit Existing Customer</span>
                    <form method="POST" action="{{route('customers.update',$customer->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="customer">Customer name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="customer"
                            name="name"
                            value="{{$customer->name}}"
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
                            value="{{$customer->dksh_customer_id}}"
                        />
                        <div class="form-control-feedback text-danger"> {{$errors->first('customer_id') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="is_ba">BA / Non BA</label>
                        <select
                            class="form-control"
                            id="is_ba"
                            name="is_ba"
                        >
                            <option selected value="">Select the Customer Type</option>
                            
                            <option value=1 @if($customer->is_ba==1) selected @endif>BA</option>
                            <option value=0 @if($customer->is_ba==0) selected @endif>Non BA</option>
                            
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('is_ba') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input
                            type="text"
                            class="form-control"
                            id="address"
                            name="address"
                            value="{{$customer->address}}"
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
                            value="{{$customer->phone_number}}"
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
                            value="{{$customer->total_frequency}}"
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
                                <option value="{{$row->id}}" @if($customer->customer_type_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('customer_type') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="division">Division</label>
                        <select
                            class="form-control"
                            id="division"
                            name="division"
                        >
                            <option selected value="">Select the division</option>
                            @foreach($divisions as $row)
                                <option value="{{$row->id}}" @if($customer->division_state_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('division') }} </div>
                    </div>

                    <div class="form-group">
                        <label for="township">Township</label>
                        <select
                            class="form-control"
                            id="township"
                            name="township"
                        >
                            <option selected value="">Select the Township</option>
                            @foreach($townships as $row)
                                <option value="{{$row->id}}" @if($customer->township_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('township') }} </div>
                    </div>


                    <div class="form-group">
                        <label for="city">City</label>
                        <select
                            class="form-control"
                            id="city"
                            name="city"
                        >
                            <option selected value="">Select the City</option>
                            @foreach($cities as $row)
                                <option value="{{$row->id}}" @if($customer->city_id==$row->id) selected @endif>{{$row->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-feedback text-danger"> {{$errors->first('city') }} </div>
                    </div>

                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
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