@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Merchadiser Input Fields Management</h2>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">Input Fields Table</h6>
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
                        <div><a href="{{ route('mr_input_fields.create') }}" type="button" class="btn"
                                style="background-color: #72F573">
                                <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new
                                    Field</span></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Merchandise Report Type</th>
                                        <th>Display Name</th>
                                        <th>Identifier</th>
                                        <th>Display Order</th>
                                        <th>Field Type</th>
                                        <th>Is Required</th>
                                        <th>Active Status</th>
                                        <th>Editor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fields as $field)
                                        <tr>
                                            <td>{{ $field->id }}</td>
                                            <td>{{ $field->merchandiser_report_type->name }}</td>
                                            <td>{{ $field->display_name }}</td>
                                            <td>{{ $field->identifier }}</td>
                                            <td>{{ $field->display_order}}</td>
                                            <td>{{ $field->field_type}}</td>
                                            <td>{{ $field->isRequired===1 ? "Yes" : "No" }}</td>
                                            <td>{{ $field->active_status===1 ? "Active" : "Inactive" }}</td>
                                            <td>
                                                <div class="t-flex-center">
                                                    <a class="btn" href="{{ route('mr_input_fields.edit', $field->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
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