@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>BA Daily Reports</h2>
            </div>
        </div>

        {{-- <div class="row mt-5"> --}}
        <div class="row">

            <div class="d-flex mt-3 justify-content-start col-12">
                <div class="ml-3">
                    {{-- <h2>Attendance records for the selected time period:</h2> --}}
    
                    <form method="post" action="{{ route('ba_daily_reports.showFilterBaDailyReports') }}">
                        @csrf
                        <label for="time_period">Select a time period to show:</label>
                        <select class="form-select" id="time_period" name="time_period">
                            <option value="last_week" {{ $timePeriod == 'last_week' ? 'selected' : '' }}>Last week</option>
                            <option value="last_month" {{ $timePeriod == 'last_month' ? 'selected' : '' }}>Last month</option>
                            <option value="last_six_months" {{ $timePeriod == 'last_six_months' ? 'selected' : '' }}>Last 6 months</option>
                            <option value="last_year" {{ $timePeriod == 'last_year' ? 'selected' : '' }}>Last year</option>
                        </select>
                        <button class="btn btn-primary btn-sm ml-3" type="submit">Show Ba Daily Reports</button>
                    </form>
                </div>
            </div>

            <div class="d-flex mt-3 justify-content-start col-12">
                {{-- <div id="date-range-filter" class="d-flex">
                            <div class="input-group mr-4">
                                <label for="min">
                                    Start Date: 
                                    <input class="form-control input-sm" type="text" id="min" name="min">
                                </label>
                            </div>
                            <div class="input-group">
                                <label for="max">
                                    End Date: 
                                    <input class="form-control input-sm" type="text" id="max" name="max">
                                </label>
                            </div>
                        </div> --}}
                <div class="form-group ml-3">
                    <p class="form-check-label active-or-not pos-r">Start Date: <input type="text" id="min"
                            name="min" class="date-w"><i class="fa-solid fa-calendar-days c-green"></i></p>
                </div>
                <div class="form-group ml-3">
                    <p class="form-check-label active-or-not pos-r">End Date: <input type="text" id="max"
                            name="max" class="date-w"><i class="fa-solid fa-calendar-days c-green"></i></p>
                </div>
                <div class="mr-5">
                    <button class="btn btn-primary dbtn-search btn-sm ml-3"><i
                            class="fa-solid fa-magnifying-glass mr-2"></i>Search</button>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">BA Daily Reports Table</h6>

                        {{-- <div id="date-range-filter" class="d-flex">
                            <div class="input-group mr-4">
                                <label for="min">
                                    Start Date: 
                                    <input class="form-control input-sm" type="text" id="min" name="min">
                                </label>
                            </div>
                            <div class="input-group">
                                <label for="max">
                                    End Date: 
                                    <input class="form-control input-sm" type="text" id="max" name="max">
                                </label>
                            </div>
                        </div> --}}

                        <div id="dt-buttons-gp" class="dt-buttons">
                            {{-- <a href="#" type="button" class="btn dbtn_export " style="background-color: #72F573">
                                <i class="fa-solid fa-file-export export-i-white mr-2"></i><span
                                    class="txt-white">Export</span>
                            </a> --}}
                        </div>
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
                            {{-- <div id="date-range-filter" class="d-flex">
                                <div class="mr-5">
                                    <label for="min">Start Date: </label>
                                    <input type="text" id="min" name="min">
                                </div>
                                <div>
                                    <label for="max">End Date: </label>
                                    <input type="text" id="max" name="max">
                                </div>
                            </div> --}}
                            <table class="table table-bordered" id="baDailyReportDataTable" width="100%" cellspacing="0">
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
                                        <th>Price Per Product</th>
                                        <th>Total Price</th>
                                        <th>Manufacture date</th>
                                        <th>Expiry Date</th>
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
                                                <td>{{ $baDailyReport->baStaff->supervisor->region->name }}</td>
                                                <td>{{ $baDailyReport->baStaff->supervisor->name }}</td>
                                                <td>{{ $baDailyReport->baStaff->city->name }}</td>
                                                <td>{{ $baDailyReport->baStaff->channel->name }}</td>
                                                <td>{{ $baDailyReport->baStaff->subchannel->name }}</td>
                                                <td>{{ $baDailyReport->customer->name }}</td>
                                                <td>{{ $baDailyReport->customer->dksh_customer_id }}</td>
                                                <td>{{ $baDailyReportProduct->product->id }}</td>
                                                <td>{{ $baDailyReportProduct->product->name }}</td>
                                                <td>{{ $baDailyReportProduct->count }}</td>
                                                <td>{{ $baDailyReportProduct->price }}</td>
                                                <td>{{ intval($baDailyReportProduct->count) * intval($baDailyReportProduct->price) }}</td>
                                                <td>{{ $baDailyReportProduct->manufacture_date }}</td>
                                                <td>{{ $baDailyReportProduct->expiry_date }}</td>
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
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[1]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // // Clear input date when refresh
            // $('#min').val('')
            // $('#max').val('')

            // // DataTables initialisation
            // var table = $('#example').DataTable();


            // Export CSV and Excel uing DataTable Features

            var table = $('#baDailyReportDataTable').DataTable();

            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    // {
                    //     extend: 'csv',
                    //     text: '<i class="fa fa-file-csv fa-beat fa-xl"></i> CSV',
                    //     className: 'btn btn-outline-success',
                    //     title: '',
                    //     enabled: true,
                    //     filename: function() {
                    //         return getCSVExportFileName();
                    //     }
                    // },

                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel fa-beat fa-xl"></i> Excel Export',
                        // className: 'btn btn-outline-primary',
                        className: 'btn btn-outline-success',
                        title: '',
                        enabled: true,
                        filename: function() {
                            return getExcelExportFileName();
                        }
                    },
                ]
            });

            // Append DataTable Buttons 
            table.buttons().container()
                .appendTo($('#dt-buttons-gp'));

            // Refilter the table (edited when clicked search button)
            $('.dbtn-search').on('click', function() {
                table.draw();
            });
            // $('#min, #max').on('change', function() {
            //     table.draw();
            // });

            // Excel Export 
            // $('#baDailyReportDataTable').dataTable({
            //     "pageLength": 10,
            //     lengthMenu: [
            //         [10, 25, 50, 100, -1],
            //         [10, 25, 50, 100, "All"],
            //     ],
            //     language: {
            //         oPaginate: {
            //             sNext: '>',
            //             sPrevious: '<',
            //         }
            //     },
            //     // "bPaginate": true,
            //     // "bLengthChange": true,
            //     // "bFilter": true,
            //     // "bSort": false,
            //     // "bInfo": true,
            //     // "bAutoWidth": false,
            //     // "bStateSave": true,
            //     // "bserverSide": true,
            //     // "bprocessing": true,
            //     "info": true,
            //     scrollX: true
            // });

            // $(".dbtn_export").click(function() {
            //     var table = $('#baDailyReportDataTable').DataTable();
            //     var tmpdataArray = table.rows({
            //         search: 'applied'
            //     }).data().toArray();
            //     var dataArray = [];
            //     console.log("tmpdataArray => ", tmpdataArray)
            //     // console.log("tmpdataArray => ", table.rows({order:'index', search:'applied', search: 'none'}).data())
            //     tmpdataArray.forEach(element => {
            //         element.pop();
            //         dataArray.push(element);
            //     });
            //     var jsondataArray = JSON.stringify(dataArray);
            //     console.log('jsondataArray => ', jsondataArray)
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         xhrFields: {
            //             responseType: 'blob',
            //         },
            //         type: 'POST',
            //         url: "{{ route('baDAilyReportExport') }}",
            //         data: {
            //             dataArray: jsondataArray,
            //         },
            //         success: function(result, status, xhr) {
            //             var disposition = xhr.getResponseHeader(
            //                 'content-disposition');
            //             var matches = /"([^"]*)"/.exec(disposition);
            //             var filename = (matches != null && matches[1] ? matches[1] :
            //                 `baDaily_report.csv`);
            //             // The actual download
            //             var blob = new Blob([result], {
            //                 type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            //             });
            //             var link = document.createElement('a');
            //             link.href = window.URL.createObjectURL(blob);
            //             link.download = filename;
            //             document.body.appendChild(link);
            //             link.click();
            //             document.body.removeChild(link);
            //         },
            //         error: function(result) {}
            //     });
            // })
        })

        function getCurrentDateTime() {
            let now = new Date();
            let date = now.getFullYear() + '-' + (now.getMonth() + 1).toString().padStart(2, '0') + '-' + now.getDate()
                .toString().padStart(2, '0');
            let time = now.getHours().toString().padStart(2, '0') + '-' + now.getMinutes().toString().padStart(2, '0') +
                '-' + now.getSeconds().toString().padStart(2, '0');
            return date + '_' + time;
        }

        function getExcelExportFileName() {
            return 'BA Daily Reports (Excel)_' + getCurrentDateTime();
        }

        function getCSVExportFileName() {
            return 'BA Daily Reports (CSV)_' + getCurrentDateTime();
        }
    </script>
@endsection
