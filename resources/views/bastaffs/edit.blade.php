@extends('template')
@section('content')
    <div>
        <h1>Edit BA Staff</h1>

        <form method="POST" action="{{ route('bastaffs.update', $baStaff) }}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="baCode">BA Code</label>
                <input name="baCode" type="text" class="form-control" id="baCode" aria-describedby="textHelp"
                    placeholder="Enter BA Code to edit" value="{{ $baStaff->ba_code }}">
            </div>


            <div class="form-group">
                <label for="baName">BA Name</label>
                <input name="baName" type="text" class="form-control" id="baName" placeholder="Name"
                    value="{{ $baStaff->name }}">
            </div>

            {{-- <div class="form-group">
                <label for="baDivision">Division</label>
                <input name="baDivision" type="text" class="form-control" id="baDivision" placeholder="Division"
                    value="{{ $baStaff->division_state_id }}">
            </div> --}}


            {{-- <div class="form-group">
                <label for="baSupervisor">Supervisor</label>
                <input name="baSupervisor" type="text" class="form-control" id="baSupervisor" placeholder="Supervisor"
                    value="{{ $supervisor->name }}">
            </div>
            <div class="form-group">
                <label for="baCity">City</label>
                <input name="baCity" type="text" class="form-control" id="baCity" placeholder="City"
                    value="{{ $city->name }}">
            </div>
            <div class="form-group">
                <label for="baOutlet">Outlet ID</label>
                <input name="baOutlet" type="text" class="form-control" id="baOutlet" placeholder="Outlet"
                    value="{{ $outlet->outlet_id }}">
            </div>
            <div class="form-group">
                <label for="baOutlet">Outlet Name</label>
                <input name="baOutlet" type="text" class="form-control" id="baOutlet" placeholder="Outlet"
                    value="{{ $outlet->name }}">
            </div>
            <div class="form-group">
                <label for="baChannel">Channel</label>
                <input name="baChannel" type="text" class="form-control" id="baChannel" placeholder="Channel"
                    value="{{ $channel->name }}">
            </div>
            <div class="form-group">
                <label for="baSubChannel">Sub Channel</label>
                <input name="baSubChannel" type="text" class="form-control" id="baSubChannel" placeholder="Sub Channel"
                    value="{{ $subchannel->name }}">
            </div> --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
