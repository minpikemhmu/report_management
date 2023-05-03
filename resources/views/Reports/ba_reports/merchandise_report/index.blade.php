@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>BA Daily Reports</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">BA Daily Reports Table</h6>
                        @if (session('successMsg') != null)
                            <div class="alert alert-success alert-dismissible fade show myalert mt-2" role="alert">
                                <strong> ✅ SUCCESS!</strong>
                                {{ session('successMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Report Date</th>
                                        <th>Merchandiser Name</th>
                                        <th>Customer Name</th>
                                        <th>Gondolar Type</th>
                                        <th>Trip Type</th>
                                        <th>Outskirt Type</th>
                                        <th>remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($merchandiserReports as $merchandiserReport)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $merchandiserReport->created_at }}</td>
                                                <td>{{ $merchandiserReport->merchandiser->name }}</td>
                                                <td>{{ $merchandiserReport->customer->name }}</td>
                                                <td>{{ $merchandiserReport->gondolar_type->name }}</td>
                                                <td>{{ $merchandiserReport->trip_type->name }}</td>
                                                <td>{{ $merchandiserReport->outskirt_type->name }}</td>
                                                <td>{{ $merchandiserReport->remark }}</td>
                                                <td>
                                                    <div class="t-flex-center">
                                                        <a class="btn" href="{{route('mr_daily_reports.show',$merchandiserReport->id)}}"><i class="fa-solid fa-xl fa-circle-info"></i></a>
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
