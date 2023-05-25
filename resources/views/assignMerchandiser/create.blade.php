@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Assign Merchandiser</h6>
            <a href="{{ route('assignMerchandiser.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span class="">Assign Merchandiser</span>
                    <form method="POST" action="{{ route('assignMerchandiser.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="merchandiser_id">Merchandiser</label>
                            <select class="form-control js-example-basic-single1" id="merchandiser_id" name="merchandiser_id">
                                <option selected value="">Choose the Merchandiser</option>
                                @foreach ($merchandisers as $row)
                                    <option {{ old('merchandiser_id') ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('merchandiser_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="customer_id">Customers</label>
                                <select class="js-example-basic-single form-control" name="customer_id[]" multiple="multiple" id="customer_id">
                                @foreach($customers as $row)
                                    <option value="{{$row->id}}">{{$row->dksh_customer_id}} - {{$row->name}}</option>
                                @endforeach
                                </select>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('customer_id') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="assign_date">Assign Date</label>
                            <input name="assign_date" type="date" class="form-control" id="assign_date"
                                placeholder="Assign Date" value="{{ old('assign_date') }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('assign_date') }} </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-single1').select2();
    $('.js-example-basic-single').select2();
})
</script>
@endsection
