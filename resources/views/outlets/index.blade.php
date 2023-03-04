@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Outlets Management</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">Outlets Table</h6>
                        @if (session('successMsg') != null)
                            <div class="alert alert-success alert-dismissible fade show myalert mt-2" role="alert">
                                <strong> ✅ SUCCESS!</strong>
                                {{ session('successMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div><a href="{{ route('outlets.create') }}" type="button" class="btn"
                                style="background-color: #72F573">
                                <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new
                                    outlet</span></a>
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
                                        <th>Outlet ID</th>
                                        <th>Outlet Name</th>
                                        {{-- <th><a href="{{ route('outlets.create') }}">Add outlet</a></th> --}}
                                        <th>Editor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($outlets as $outlet)
                                        <tr>
                                            <td>{{ $outlet->id }}</td>
                                            <td>{{ $outlet->outlet_id }}</td>
                                            <td>{{ $outlet->name }}</td>
                                            <td><a href="{{ route('outlets.edit', $outlet) }}">Edit</a></td>
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
                        <td><a href="{{ route('outlets.edit', $outlet) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
@endsection
