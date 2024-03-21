@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Customer Management</h2>
        </div>
    </div>
    <div class="row">
        <div>
            <form action="{{ route('customerImport') }}" method="POST" enctype="multipart/form-data" class="d-flex gap-0">
                @csrf
                <div class="form-group flex-grow-1">
                    <label for="file">Excel File</label>
                    <input type="file" name="file" id="file" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mb-4 flex-grow-1">Import</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow mb-4">
            <div id="dt-buttons-gp" class="dt-buttons ml-3 mt-3">
                            <a href="{{ route('customers.export') }}" type="button" class="btn dbtn_export " style="background-color: #72F573">
                                <i class="fa-solid fa-file-export export-i-white mr-2"></i><span
                                    class="txt-white">Export</span>
                            </a>
                </div>
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="mt-2 font-weight-bold float-left ut-title">Customer Table</h6>
                    @if(session('successMsg') != NULL)
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
                    <div><a href="{{route('customers.create')}}" type="button" class="btn" style="background-color: #72F573">
                            <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new customer</span></a>
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
                                <table class="table table-bordered" id="datatable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>BA/Non BA</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Division</th>
                                            <th>Township</th>
                                            <th>City</th>
                                            <th>Customer Type</th>
                                            <th>Total Frequency</th>
                                            <th>Outlet Brand</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($customers as $row)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->dksh_customer_id}}</td>
                                                <td>{{$row->is_ba == 1 ? 'BA' : 'Non BA'}}</td>
                                                <td>{{$row->phone_number}}</td>
                                                <td>{{$row->address}}</td>
                                                <td>{{$row->division_state->name}}</td>
                                                <td>{{$row->township->name}}</td>
                                                <td>{{$row->city->name}}</td>
                                                <td>{{$row->customer_type->name}}</td>
                                                <td>{{$row->total_frequency}}</td>
                                                <td>{{$row->outlet_brand}}</td>
                                                <td>
                                                    <div class="t-flex-center">
                                                        <a class="btn" href="{{route('customers.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
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
