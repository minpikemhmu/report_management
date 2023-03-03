@extends('template')
@section('content')
    <div>
        <h1>BA Staff List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>BA Code</th>
                    <th>BA Name</th>
                    
                    <th>Supervisor</th>
                    <th>City</th>
                    <th>Outlet ID</th>
                    <th>Outlet Name</th>
                    <th>Key Channel</th>
                    <th>Sub Channel</th>
                    <th><a href="{{ route('bastaffs.create') }}">Add BA Staff</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($baStaffs as $baStaff)
                <tr>
                    <td>{{ $baStaff->id }}</td>
                    <td>{{ $baStaff->ba_code }}</td>
                    <td>{{ $baStaff->name }}</td>
                    {{-- <td>{{ $baStaff->division_state_id }}</td> --}}
                    <td>{{ $baStaff->supervisor_id ? $supervisor[$baStaff->supervisor_id - 1]->name  : null}}</td>
                    <td>{{ $baStaff->city_id ? $city[$baStaff->city_id - 1]->name : null }}</td>
                    <td>{{ $baStaff->outlet_id ? $outlet[$baStaff->outlet_id - 1]->outlet_id : null}}</td>
                    <td>{{ $baStaff->outlet_id ? $outlet[$baStaff->outlet_id - 1]->name : null}}</td>
                    <td>{{ $baStaff->channel_id ? $channel[$baStaff->channel_id - 1]->name : null}}</td>
                    <td>{{ $baStaff->subchennel_id ? $subchannel[$baStaff->subchennel_id - 1]->name : null}}</td>
                    <td><a href="{{ route('bastaffs.edit', $baStaff) }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 