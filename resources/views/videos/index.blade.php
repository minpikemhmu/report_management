@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Video Management</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">Mr Leader Table</h6>
                        @if (session('successMsg') != null)
                            <div class="alert alert-success alert-dismissible fade show myalert mt-2" role="alert">
                                <strong> ✅ SUCCESS!</strong>
                                {{ session('successMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div><a href="{{ route('videos.create') }}" type="button" class="btn"
                                style="background-color: #72F573">
                                <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new
                                    Video</span></a>
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Link</th>
                                        <th>Editor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($videos as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td> <a href="{{$row->link}}">{{ $row->link }}</a></td>
                                            <td>
                                                <div class="d-flex flex-row">
                                                    <a  class="btn" href="{{ route('videos.edit', $row->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a class="btn" href="{{ route('videos.show', $row->id) }}">
                                                            <i class="fa-solid fa-xl fa-circle-info"></i>
                                                        </a>
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