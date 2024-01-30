@extends('template')
@section('content')
    <!-- Page Heading -->
    <div class="card my-2">
        <div class="card-header" style="background-color: #4e73df;">
            <h3 class="h3 mb-2 text-white ml-3 mt-2">Merchandisers who watched the {{$video->title}}</h3>
            <h6 class="text-white ml-3 mt-2">Total : <span class="badge badge-light">{{ count($video_mr)}}</span></h6>
        </div>
        <div class="card-body">
            <ul class="list-group" style="max-height: 200px;overflow-y: auto;">
                @foreach($video_mr as $merchandiser)
                    <li class="list-group-item">{{$merchandiser->merchandiser_name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="card-header" style="background-color: #4e73df;">
            <h3 class="h3 mb-2 text-white ml-3 mt-2">BaStaffs who watched the {{$video->title}}</h3>
            <h6 class="text-white ml-3 mt-2">Total : <span class="badge badge-light">{{ count($video_ba)}}</span></h6>
        </div>
        <div class="card-body">
            <ul class="list-group" style="max-height: 200px;overflow-y: auto;">
                @foreach($video_ba as $baStaff)
                    <li class="list-group-item">{{$baStaff->bastaff_name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection 