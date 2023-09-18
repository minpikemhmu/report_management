@extends('template')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 align-items-center">
                <h2>{{$merchandiserReport->merchandiser}}'s Reports Detail</h2>
                <h6>{{$merchandiserReport->created_at}}</h6>
            </div>
        </div>
        <div class="row mt-2">
            <div class="card shadow col-12">
                    <div class="row">
                        <div class="py-3 d-flex align-items-center justify-content-between">
                            <a href="{{ route('mr_daily_reports.index') }}" class="btn btn-sm btn-dark ml-2"><i class="fa-solid fa-arrow-left-long"></i>
                            back</a><h6 class="mt-2 font-weight-bold float-left ut-title ml-3">Daily Reports Detail</h6>
                        </div>
                    </div>
                    <div class="row mb-5 ml-3">
                        <ul class="list-group w-75 mx-auto">
                            <li class="list-group-item"><span class="font-weight-bold h6">customer name</span> : {{$merchandiserReport->customer}}</li>
                            @php
                                $uniqueKeys = ['id','created_at', 'customer', 'merchandiser', 'latitude', 'longitude', 'actual_latitude', 'actual_longitude'];
                            @endphp

                            @foreach ($merchandiserReport as $key => $value)
                                @if (!in_array($key, $uniqueKeys))
                                  @if (filter_var($value, FILTER_VALIDATE_URL))
                                      <li class="list-group-item d-flex flex-row"><span class="font-weight-bold h6 mr-2">{{ $key }}</span> : 
                                        <div class="col-md-2 px-0 ml-2"><img src="{{$value}}" alt="{{$key}}" class="img-thumbnail image-modal" data-key="{{$key}}" data-value="{{$value}}">
                                        </div>
                                    </li>
                                  @else
                                      <li class="list-group-item"><span class="font-weight-bold h6">{{ $key }}</span> : {{$value}}</li>
                                  @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".image-modal").click(function(){
                var dataKey = $(this).data("key");
                var dataValue = $(this).data("value");
                $("#exampleModalCenter").modal("show");
                $("#exampleModalLongTitle").html(dataKey);
                var html = `<img src="${dataValue}" alt="${dataKey}" class="img-thumbnail" width="100%" style="height:400px;">`;
                $(".modal-body").html(html);
            })
        })
    </script>
@endsection
