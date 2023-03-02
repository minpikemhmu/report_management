@extends('template')
@section('content')
    <div>
        <h1>New Outlet</h1>

        <form method="POST" action="{{ route('outlets.store') }}">
            @csrf

            <div class="form-group">
                <label for="outletId">Outlet ID</label>
                <input name="outletId" type="text" class="form-control" id="outletId" aria-describedby="textHelp"
                    placeholder="Enter Outlet ID to edit">
            </div>


            <div class="form-group">
                <label for="outletName">Outlet Name</label>
                <input name="outletName" type="text" class="form-control" id="outletName" placeholder="Outlet Name">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
@endsection
