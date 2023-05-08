@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Merchandiser Reports</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">Merchandiser Reports Table</h6>
                        <div>
                            <a href="#" type="button" class="btn dbtn_export" style="background-color: #72F573">
                                <i class="fa-solid fa-file-export export-i-white mr-2"></i><span class="txt-white">Export</span>
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
                                        <th>Gondolar Type</th>
                                        <th>Trip Type</th>
                                        <th>Outskirt Type</th>
                                        <th>remark</th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
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
                                                <td class="d-none">{{$merchandiserReport->gondolar_size_inches_length}}</td>
                                                <td class="d-none">{{$merchandiserReport->gondolar_size_inches_weight}}</td>
                                                <td class="d-none">{{$merchandiserReport->gondolar_size_centimeters_length}}</td>
                                                <td class="d-none">{{$merchandiserReport->gondolar_size_centimeters_weight}}</td>
                                                <td class="d-none">{{$merchandiserReport->backlit_size_inches_length}}</td>
                                                <td class="d-none">{{$merchandiserReport->backlit_size_inches_weight}}</td>
                                                <td class="d-none">{{$merchandiserReport->backlit_size_centimeters_length}}</td>
                                                <td class="d-none">{{$merchandiserReport->backlit_size_centimeters_weight}}</td>
                                                <td class="d-none">{{$merchandiserReport->qty}}</td>
                                                <td class="d-none">{{$merchandiserReport->latitude}}</td>
                                                <td class="d-none">{{$merchandiserReport->longitude}}</td>
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
            $('#merchandiserTable').dataTable({
                "pageLength": 10,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100],
                    ],
                    language: {
                        oPaginate: {
                            sNext: '>',
                            sPrevious: '<',
                        }
                    },
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": false,
                    "bInfo": true,
                    "bAutoWidth": false,
                    "bStateSave": true,
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [-1]
                    }, ],
                    "bserverSide": true,
                    "bprocessing": true,
                    "info": true,
                    scrollX: true
            });

            $(".dbtn_export").click(function(){
                var table = $('#merchandiserTable').DataTable();
                var tmpdataArray = table.rows( {search:'applied'} ).data().toArray();
                var dataArray = [];
                tmpdataArray.forEach(element => {
                    element.pop();
                    dataArray.push(element);
                });
                var jsondataArray = JSON.stringify(dataArray);
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                xhrFields: {
                    responseType: 'blob',
                },
                type: 'POST',
                url: "{{route('merchandiserReportExport')}}",
                data: {
                    dataArray: jsondataArray,
                },
                success: function(result, status, xhr) {
                    var disposition = xhr.getResponseHeader(
                        'content-disposition');
                    var matches = /"([^"]*)"/.exec(disposition);
                    var filename = (matches != null && matches[1] ? matches[1] :
                        `merchandiser_report.csv`);
                    // The actual download
                    var blob = new Blob([result], {
                        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = filename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                error: function(result) {
                }
            });
            })
        })
    </script>
@endsection
