@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Merchandiser Management</h2>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="mt-2 font-weight-bold float-left ut-title">Merchandiser Table</h6>
                    @if(session('successMsg') != NULL)
                    <div class="alert alert-success alert-dismissible fade show myalert mt-2" role="alert">
                        <strong> ✅ SUCCESS!</strong>
                        {{ session('successMsg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div><a href="{{route('merchandiser.create')}}" type="button" class="btn" style="background-color: #72F573">
                            <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new merchandiser</span></a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="table-responsive">
                        <table class="table table-bordered v-center-th-td" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Region</th>
                                    <th>Division</th>
                                    <th>Township</th>
                                    <th>City</th>
                                    <th>Customer Type</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div> -->
                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Mer Code</th>
                                            <th>Region</th>
                                            <th>Mer Team</th>
                                            <th>Mer Area</th>
                                            <th>Channel</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($merchandiser as $row)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->mer_code}}</td>
                                                <td>{{$row->region->name}}</td>
                                                <td>{{$row->merchantTeam->name}}</td>
                                                <td>{{$row->merchantArea->name}}</td>
                                                <td>{{$row->channel->name}}</td>
                                                <td>
                                                    <div class="t-flex-center">
                                                        <a class="btn" href="{{route('merchandiser.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){ $('.myalert').hide(); showDiv2() },3000);
    })
</script>
@endsection
