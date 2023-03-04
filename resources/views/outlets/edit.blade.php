@extends('template')
@section('content')
    <div>
        <h1>Edit Outlet</h1>

        <form method="POST" action="{{ route('outlets.update', $outlet) }}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="outletId">Outlet ID</label>
                <input name="outletId" type="text" class="form-control" id="outletId" aria-describedby="textHelp"
                    placeholder="Enter Outlet ID to edit" value="{{ $outlet->outlet_id }}">
            </div>


            <div class="form-group">
                <label for="outletName">Outlet Name</label>
                <input name="outletName" type="text" class="form-control" id="outletName" placeholder="Outlet Name"
                    value="{{ $outlet->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
