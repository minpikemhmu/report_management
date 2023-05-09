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
                <div class="form-group ml-3">
                    <p class="form-check-label active-or-not pos-r">Start Date: <input type="text" id="dstartDate" class="date-w"><i class="fa-solid fa-calendar-days c-green"></i></p>
                </div>
                <div class="form-group ml-3">
                    <p class="form-check-label active-or-not pos-r">End Date: <input type="text" id="dendDate" class="date-w"><i class="fa-solid fa-calendar-days c-green"></i></p>
                </div>
                <div class="mr-5">
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
                                        <th>Gondolar Type</th>
                                        <th>Trip Type</th>
                                        <th>Outskirt Type</th>
                                        <th class="d-none">remark</th>
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
                                                <td class="d-none">{{ $merchandiserReport->remark }}</td>
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

            function getMinDate(){ 
                var minDate = new Date();
                minDate.setTime(minDate.getTime() - 6*24*60*60*1000);
                return minDate;
            }

            $("#dstartDate").datepicker({ dateFormat: 'dd-mm-yy'});
            $("#dstartDate").datepicker('setDate', getMinDate());
            $("#dendDate").datepicker({ dateFormat: 'dd-mm-yy' });
            $("#dendDate").datepicker('setDate', new Date());

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
                    if(element.DT_RowIndex){
                        console.log(element.DT_RowIndex);
                        var values = [element.DT_RowIndex,element.created_at,element.merchandiser_name,element.customer_name,element.gondolar_type_name,element.trip_type_name,element.outskirt_type_name,
                        element.remark,element.gondolar_size_inches_length,element.gondolar_size_inches_weight,
                        element.gondolar_size_centimeters_length,element.gondolar_size_centimeters_weight,element.backlit_size_inches_length,
                        element.backlit_size_inches_weight,element.backlit_size_centimeters_length,element.backlit_size_centimeters_weight,
                        element.qty,element.latitude,element.longitude];
                        dataArray.push(values);
                    }else{
                        element.pop();
                        dataArray.push(element);
                    }
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

            $(".dbtn-search").click(function(){
                var startDate = $("#dstartDate").val();
                var endDate   = $("#dendDate").val();
                var table = $('#merchandiserTable').DataTable();
                table.destroy();
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
                        "bFilter": false,
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
                        "ajax": {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('getMerchandiserReport') }}",
                            type: 'get',
                            dataType: 'json',
                            data:{
                            "startDate" : startDate,
                            "endDate" : endDate,
                            },
                            global: false,
                            async: true,
                        },
                        "columns": [
                            {
                                "data": null,
                                render: function(data, type, full, meta, row) {;
                                    return  data.DT_RowIndex;
                                }
                            },
                            {"data" : "created_at"},
                            { "data": "merchandiser_name"},
                            { "data": "customer_name"},
                            { "data": "gondolar_type_name"},
                            { "data": "trip_type_name"},
                            { "data": "outskirt_type_name"},
                            { "data": "remark"},
                            { "data": "gondolar_size_inches_length"},
                            { "data": "gondolar_size_inches_weight"},
                            { "data": "gondolar_size_centimeters_length"},
                            { "data": "gondolar_size_centimeters_weight"},
                            { "data": "backlit_size_inches_length"},
                            { "data": "backlit_size_inches_weight"},
                            { "data": "backlit_size_centimeters_length"},
                            { "data": "backlit_size_centimeters_weight"},
                            { "data": "qty"},
                            { "data": "latitude"},
                            { "data": "longitude"},
                            {
                                "data": null,
                                render: function(data, type, full, meta, row) {
                                    var url="{{route('mr_daily_reports.show',':id')}}"
                                    url=url.replace(':id',data.id);
                                    return `
                                    <div class="t-flex-center">
                                                        <a class="btn" href="${url}"><i class="fa-solid fa-xl fa-circle-info"></i></a>
                                    </div>
                                    `
                                }
                            },
                        ],
                        "info": true,
                        "columnDefs": [
                            {
                                "targets": 7,
                                "className": "hide-column"
                            },
                            {
                                "targets": 8,
                                "className": "hide-column"
                            },
                            {
                                "targets": 9,
                                "className": "hide-column"
                            },
                            {
                                "targets": 10,
                                "className": "hide-column"
                            },
                            {
                                "targets": 11,
                                "className": "hide-column"
                            },
                            {
                                "targets": 12,
                                "className": "hide-column"
                            },
                            {
                                "targets": 13,
                                "className": "hide-column"
                            },
                            {
                                "targets": 14,
                                "className": "hide-column"
                            },
                            {
                                "targets": 15,
                                "className": "hide-column"
                            },
                            {
                                "targets": 16,
                                "className": "hide-column"
                            },
                            {
                                "targets": 17,
                                "className": "hide-column"
                            },
                            {
                                "targets": 18,
                                "className": "hide-column"
                            },
                        ]
                });
            })
        })
    </script>
@endsection
