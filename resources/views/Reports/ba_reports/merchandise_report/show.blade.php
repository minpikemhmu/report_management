@extends('template')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 align-items-center">
                <h2>{{$merchandiserReport->merchandiser->name}}'s Reports Detail</h2>
                <h6>{{$merchandiserReport->created_at}}</h6>
            </div>
        </div>
        <div class="row mt-5">
            <div class="card shadow col-12">
                    <div class="row mb-4">
                        <div class="py-3 d-flex align-items-center justify-content-between">
                            <a href="{{ route('mr_daily_reports.index') }}" class="btn btn-sm btn-dark ml-2"><i class="fa-solid fa-arrow-left-long"></i>
                            back</a><h6 class="mt-2 font-weight-bold float-left ut-title ml-3">Daily Reports Detail</h6>
                        </div>
                    </div>
                    <div class="row mb-5 ml-3">
                        <ul class="list-group w-75 mx-auto">
                            <li class="list-group-item"><span class="font-weight-bold h6">customer name</span> : {{$merchandiserReport->customer->name}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">gondolar size inches length</span> : {{$merchandiserReport->gondolar_size_inches_length}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">gondolar size inches weigh</span> : {{$merchandiserReport->gondolar_size_inches_weight}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">gondolar size centimeters length</span> : {{$merchandiserReport->gondolar_size_centimeters_length}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">gondolar size centimeters weight</span> : {{$merchandiserReport->gondolar_size_centimeters_weight}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">backlit size inches length</span> : {{$merchandiserReport->backlit_size_inches_length}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">backlit size inches weight</span> : {{$merchandiserReport->backlit_size_inches_weight}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">backlit size centimeters length</span> : {{$merchandiserReport->gondolar_size_centimeters_length}}</li>
                            <li class="list-group-item"><span class="font-weight-bold h6">backlit size centimeters weight</span> : {{$merchandiserReport->backlit_size_centimeters_weight}}</li>
                            <li class="list-group-item d-flex flex-row"><span class="font-weight-bold h6 mr-2">outlet photo before</span> : <div class="col-md-2 px-0 ml-2"><img src="{{$merchandiserReport->outlet_photo_before}}" alt="outlet photo before" class="img-thumbnail"></div></li>
                            <li class="list-group-item d-flex flex-row"><span class="font-weight-bold h6 mr-2">outlet photo after</span> : <div class="col-md-2 px-0 ml-2"><img src="{{$merchandiserReport->outlet_photo_after}}" alt="outlet photo after" class="img-thumbnail"></div></li>
                            <li class="list-group-item"><span class="font-weight-bold h6">qty</span> : {{$merchandiserReport->qty}}</li>
                        </ul>
                    </div>
            </div>
        </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.myalert').hide();
                showDiv2()
            }, 3000);
        })
    </script>
@endsection
