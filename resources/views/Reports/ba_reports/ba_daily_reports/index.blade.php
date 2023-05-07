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

            // Export CSV and Excel uing DataTable Features

            var table = $('#baDailyReportDataTable').DataTable();

            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-csv fa-beat fa-xl"></i> CSV',
                        className: 'btn btn-outline-success',
                        title: '',
                        enabled: true,
                        filename: function () { return getCSVExportFileName();}
                    },

                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel fa-beat fa-xl"></i> Excel',
                        className: 'btn btn-outline-primary',
                        title: '',
                        enabled: true,
                        filename: function () { return getExcelExportFileName();}
                    },
                ]
            });

            // Append DataTable Buttons 
            table.buttons().container()
                .appendTo($('#dt-buttons-gp'));

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
