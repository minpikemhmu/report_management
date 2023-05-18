@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Assign Customer To Merchandiser</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div>
                <form action="{{route('assignMerchandiserImport')}}" method="POST" enctype="multipart/form-data" class="d-flex gap-0">
                    @csrf
                    <div class="form-group flex-grow-1">
                        <label for="file">Excel File</label>
                        <input type="file" name="file" id="file">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-4 flex-grow-1">Import</button>
                </form>
            </div>
        </div>
        <div class="">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">Merchandiser Assigns Table</h6>
                        @if (session('successMsg') != null)
                            <div class="alert alert-success alert-dismissible fade show myalert mt-2" role="alert">
                                <strong> ✅ SUCCESS!</strong>
                                {{ session('successMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('failedMsg') != null)
                            <div class="alert alert-danger alert-dismissible fade show myalert mt-2" role="alert">
                                <strong> ✅ Fail!</strong>
                                {{ session('failedMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div><a href="{{ route('assignMerchandiser.create') }}" type="button" class="btn"
                                style="background-color: #72F573">
                                <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Assign</span></a>
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
                                        <th>No.</th>
                                        <th>Merchandiser</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Editor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($merchandisers as $row)
                                        @php
                                        $date = $row->assign_date;
                                        $day = date('l', strtotime($date));
                                    @endphp
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->merchandiser}}</td>
                                            <td>{{$row->customer}}</td>
                                            <td>{{$row->assign_date}}</td>
                                            <td>{{$day}}</td>
                                            <td>
                                                <div class="t-flex-center">
                                                <form action="{{ route('assignMerchandiser.destroy',$row->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
                                                </form>
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

    {{-- <div>
        <h1>Outlets List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Outlet ID</th>
                    <th>Outlet Name</th>
                    <th><a href="{{ route('outlets.create') }}">Add outlet</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outlets as $outlet)
                    <tr>
                        <td>{{ $outlet->id }}</td>
                        <td>{{ $outlet->outlet_id }}</td>
                        <td>{{ $outlet->name }}</td>
                        <td>
                            <div class="t-flex-center">
                                <a  class="btn" href="{{ route('outlets.edit', $outlet) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){ $('.myalert').hide(); showDiv2() },3000);
    })
</script>
@endsection