@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>BA Assign</h2>
            </div>
        </div>

        {{-- <div class="row mt-5"> --}}
        <div class="row">

            <div class="d-flex mt-3 justify-content-start col-12">
                <div class="ml-3">
                    {{-- <h2>Assign records for the selected time period:</h2> --}}

                    <form method="post" action="{{ route('assignBa.showFilterBaAssign') }}">
                        @csrf
                        <label for="time_period">Select a time period to show:</label>
                        <select class="form-select" id="time_period" name="time_period">
                            <option value="last_week" {{ $timePeriod == 'last_week' ? 'selected' : '' }}>Last week</option>
                            <option value="last_month" {{ $timePeriod == 'last_month' ? 'selected' : '' }}>Last month
                            </option>
                            <option value="last_six_months" {{ $timePeriod == 'last_six_months' ? 'selected' : '' }}>Last 6
                                months</option>
                            <option value="last_year" {{ $timePeriod == 'last_year' ? 'selected' : '' }}>Last year</option>
                        </select>
                        <button class="btn btn-primary btn-sm ml-3" type="submit">Show Assign Records</button>
                    </form>
                </div>
            </div>

            <div class="d-flex mt-3 justify-content-start col-12">
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
                        <h6 class="mt-2 font-weight-bold float-left ut-title">BA Assign Table</h6>
                        <div id="dt-buttons-gp" class="dt-buttons">

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
                        <div><a href="{{ route('assignBa.create') }}" type="button" class="btn"
                                style="background-color: #72F573">
                                <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Assign
                                    BA</span></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="baAssignDataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>BA Code</th>
                                        <th>BA Name</th>
                                        <th>Product Key Category</th>
                                        <th>Target Quantity</th>
                                        <th>Customer</th>
                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Assign Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($getAllBaAssigns as $baAssign)
                                        <tr>
                                            <td>{{ ++$count }}</td>
                                            <td>{{ $baAssign->baStaff->ba_code }}</td>
                                            <td>{{ $baAssign->baStaff->name }}</td>
                                            <td>{{ $baAssign->productKeyCategory->name ?? 'N/A' }}</td>
                                            <td>{{ $baAssign->target_quantity ?? 'N/A' }}</td>
                                            <td>{{ $baAssign->baStaff->customer->name ?? 'N/A' }}</td>
                                            <td>{{ $baAssign->year ?? 'N/A' }}</td>
                                            <td>{{ DateTime::createFromFormat('!m', $baAssign->month)->format('F') ?? 'N/A' }}
                                            </td>
                                            <td>{{ date('Y-m-d h:i:s A', strtotime($baAssign->created_at)) ?? 'N/A' }}</td>
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
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
            
                // var date = new Date(data[1]);
                // using "Assign Created At" time in filter
                var date = new Date(data[8].split(" ")[0]);

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


            // // Export CSV and Excel uaing DataTable Features

            // var table = $('#baAssignDataTable').DataTable();
            var table = $('#baAssignDataTable').DataTable();

            // new $.fn.dataTable.Buttons(table, {
            //     buttons: [
            //         // {
            //         //     extend: 'csv',
            //         //     text: '<i class="fa fa-file-csv fa-beat fa-xl"></i> CSV',
            //         //     className: 'btn btn-outline-success',
            //         //     title: '',
            //         //     enabled: true,
            //         //     filename: function() {
            //         //         return getCSVExportFileName();
            //         //     }
            //         // },

            //         {
            //             extend: 'excel',
            //             text: '<i class="fa fa-file-excel fa-beat fa-xl"></i> Excel Export',
            //             // className: 'btn btn-outline-primary',
            //             className: 'btn btn-outline-success',
            //             title: '',
            //             enabled: true,
            //             filename: function() {
            //                 return getExcelExportFileName();
            //             }
            //         },
            //     ]
            // });

            // // Append DataTable Buttons 
            // table.buttons().container()
            //     .appendTo($('#dt-buttons-gp'));

            // Refilter the table (edited when clicked search button)
            $('.dbtn-search').on('click', function() {
                table.draw();
            });
        })

        // function getCurrentDateTime() {
        //     let now = new Date();
        //     let date = now.getFullYear() + '-' + (now.getMonth() + 1).toString().padStart(2, '0') + '-' + now.getDate()
        //         .toString().padStart(2, '0');
        //     let time = now.getHours().toString().padStart(2, '0') + '-' + now.getMinutes().toString().padStart(2, '0') +
        //         '-' + now.getSeconds().toString().padStart(2, '0');
        //     return date + '_' + time;
        // }

        // function getExcelExportFileName() {
        //     return 'BA Assign Reports (Excel)_' + getCurrentDateTime();
        // }

        // function getCSVExportFileName() {
        //     return 'BA Assign Reports (CSV)_' + getCurrentDateTime();
        // }
    </script>
@endsection
