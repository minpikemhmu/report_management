@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Merchandiser Reports</h2>
            </div>
        </div>
        <div class="row">
            <div class="d-flex mt-3 justify-content-start col-12">
                <div class="form-group">
                    <p class="form-check-label active-or-not pos-r">Start Date: <input type="text" id="dstartDate" class="date-w"><i class="fa-solid fa-calendar-days c-green"></i></p>
                </div>
                <div class="form-group">
                    <p class="form-check-label active-or-not pos-r">End Date: <input type="text" id="dendDate" class="date-w"><i class="fa-solid fa-calendar-days c-green"></i></p>
                </div>
                <div class="form-group">
                    <p class="form-check-label active-or-not pos-r">Report Type: 
                        <select class="form-control js-example-basic-single" id="merchandiser_report_type_id" name="merchandiser_report_type_id">
                            <option selected value="">Choose Merchandiser Report Type</option>
                            @foreach ($report_types as $row)
                                <option {{ old('merchandiser_report_type_id') ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </i>
                    </p>
                </div>
                <div>
                    <button class="btn btn-primary dbtn-search btn-sm ml-3"><i class="fa-solid fa-magnifying-glass mr-2"></i>Search</button>
                </div>
            </div>

            <div class="">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">Merchandiser Reports Table</h6>
                        <div>
                            <a href="#" type="button" class="btn btn-outline-success dbtn_export">
                                {{-- <i class="fa-solid fa-file-export export-i-white mr-2"></i><span class="txt-white">Export</span> --}}
                                <i class="fa fa-file-excel fa-beat fa-xl"></i> Excel Export
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="merchandiserTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Report Date</th>
                                        <th>Merchandiser Name</th>
                                        <th>Customer Name</th>
                                        <th>Report Type</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Actual Latitude</th>
                                        <th>Actual Longitude</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($merchandiserReports as $merchandiserReport)
                                        @php
                                        $originalDatetime = $merchandiserReport->created_at;

                                        // Convert the string to a Unix timestamp
                                        $timestamp = strtotime($originalDatetime);

                                        // Format the timestamp in the desired 12-hour format
                                        $report_date = date("Y-m-d h:ia", $timestamp);
                                        @endphp
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $report_date }}</td>
                                                <td>{{ $merchandiserReport->merchandiser }}</td>
                                                <td>{{ $merchandiserReport->customer }}</td>
                                                <td>{{ $merchandiserReport->report_type }}</td>
                                                <td>{{ $merchandiserReport->latitude }}</td>
                                                <td>{{ $merchandiserReport->longitude }}</td>
                                                <td>{{ $merchandiserReport->actual_latitude }}</td>
                                                <td>{{ $merchandiserReport->actual_longitude }}</td>
                                                <td>
                                                    <div class="t-flex-center">
                                                        <a class="btn" href="{{ route('mr_daily_reports.show', $merchandiserReport->id) }}">
                                                            <i class="fa-solid fa-xl fa-circle-info"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Custom pagination links -->
                            <div class="pagination">
                                {!! $merchandiserReports->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>

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

            function getMinDate(){ 
                var minDate = new Date();
                minDate.setTime(minDate.getTime() - 6*24*60*60*1000);
                return minDate;
            }

            $("#dstartDate").datepicker({ dateFormat: 'dd-mm-yy'});
            $("#dstartDate").datepicker('setDate', getMinDate());
            $("#dendDate").datepicker({ dateFormat: 'dd-mm-yy' });
            $("#dendDate").datepicker('setDate', new Date());
        })
    </script>
@endsection
