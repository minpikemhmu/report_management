@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>BA Staff Management</h2>
            </div>
        </div>
        <div class="row">
            <div>
                <form action="{{ route('baStaffImport') }}" method="POST" enctype="multipart/form-data" class="d-flex gap-0">
                    @csrf
                    <div class="form-group flex-grow-1">
                        <label for="file">Excel File</label>
                        <input type="file" name="file" id="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-4 flex-grow-1">Import</button>
                </form>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">BA Staff Table</h6>
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
                        <div><a href="{{ route('bastaffs.create') }}" type="button" class="btn"
                                style="background-color: #72F573">
                                <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new
                                    BA Staff</span></a>
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
                                        <th>BA Code</th>
                                        <th>BA Name</th>
                                        <th>Supervisor</th>
                                        <th>City</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Product Brand</th>
                                        <th>Key Channel</th>
                                        <th>Sub Channel</th>
                                        <th>Editor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($baStaffs as $baStaff)
                                        <tr>
                                            {{-- <td>{{ $baStaff->id }}</td> --}}
                                            <td>{{ ++$count }}</td>
                                            <td>{{ $baStaff->ba_code }}</td>
                                            <td>{{ $baStaff->name }}</td>
                                            {{-- <td>{{ $baStaff->division_state_id }}</td> --}}
                                            <td>{{ $baStaff->supervisor->name }}
                                            </td>
                                            <td>{{ $baStaff->city->name }}</td>
                                            <td>{{ $baStaff->customer->dksh_customer_id }}
                                            </td>
                                            <td>{{ $baStaff->customer->name }}
                                            </td>
                                            <td>{{ $baStaff->productBrand->name ?? 'N/A' }}
                                            </td>
                                            <td>{{ $baStaff->channel->name }}
                                            </td>
                                            <td>{{ $baStaff->subchannel->name }}
                                            </td>
                                            <td>
                                                <div class="t-flex-center">
                                                    <a class="btn" href="{{ route('bastaffs.edit', $baStaff) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
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
            setTimeout(function() {
                $('.myalert').hide();
                showDiv2()
            }, 3000);
        })
    </script>
@endsection
