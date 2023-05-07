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
                                        <th>BA Report Date</th>
                                        <th>BA Report Type</th>
                                        <th>BA Code</th>
                                        <th>BA Name</th>

                                        <th>Region</th>
                                        <th>Supervisor</th>
                                        <th>City</th>
                                        <th>Key Channel</th>
                                        <th>Sub Channel</th>

                                        <th>Customer Name</th>
                                        <th>Customer ID</th>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($baDailyReports as $baDailyReport)
                                        @foreach ($baDailyReport->baDailyReportProducts as $baDailyReportProduct)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $baDailyReport->ba_report_date }}</td>
                                                <td>{{ $baDailyReport->baReportType->name }}</td>
                                                <td>{{ $baDailyReport->baStaff->ba_code }}</td>
                                                <td>{{ $baDailyReport->baStaff->name }}</td>

                                                <th>{{ $baDailyReport->baStaff->supervisor->region->name }}</th>
                                                <th>{{ $baDailyReport->baStaff->supervisor->name }}</th>
                                                <th>{{ $baDailyReport->baStaff->city->name }}</th>
                                                <th>{{ $baDailyReport->baStaff->channel->name }}</th>
                                                <th>{{ $baDailyReport->baStaff->subchannel->name }}</th>

                                                <td>{{ $baDailyReport->customer->name }}</td>
                                                <td>{{ $baDailyReport->customer->dksh_customer_id }}</td>
                                                <td>{{ $baDailyReportProduct->product->id }}</td>
                                                <td>{{ $baDailyReportProduct->product->name }}</td>
                                                <td>{{ $baDailyReportProduct->count }}</td>
                                            </tr>
                                        @endforeach
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
