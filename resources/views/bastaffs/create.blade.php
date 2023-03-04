@extends('template')
@section('content')
    <div>
        <h1>Create BA Staff</h1>

        <form method="POST" action="{{ route('bastaffs.store') }}">
            @csrf

            <div class="form-group">
                <label for="baCode">BA Code</label>
                <input name="baCode" type="text" class="form-control" id="baCode" aria-describedby="textHelp"
                    placeholder="Enter BA Code">
            </div>


            <div class="form-group">
                <label for="baName">BA Name</label>
                <input name="baName" type="text" class="form-control" id="baName" placeholder="Enter BA Name">
            </div>

            {{-- <div class="form-group">
                <label for="baDivision">Division</label>
                <input name="baDivision" type="text" class="form-control" id="baDivision" placeholder="Division">
            </div> --}}
            {{-- <div class="form-group">
                <label for="baSupervisor">Supervisor</label>
                <input name="baSupervisor" type="text" class="form-control" id="baSupervisor" placeholder="Supervisor">
            </div>
            <div class="form-group">
                <label for="baCity">City</label>
                <input name="baCity" type="text" class="form-control" id="baCity" placeholder="City">
            </div>
            <div class="form-group">
                <label for="baOutlet">Outlet</label>
                <input name="baOutlet" type="text" class="form-control" id="baOutlet" placeholder="Outlet">
            </div>
            <div class="form-group">
                <label for="baChannel">Channel</label>
                <input name="baChannel" type="text" class="form-control" id="baChannel" placeholder="Channel">
            </div>
            <div class="form-group">
                <label for="baSubChannel">Sub Channel</label>
                <input name="baSubChannel" type="text" class="form-control" id="baSubChannel" placeholder="Sub Channel">
            </div> --}}
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
@endsection
