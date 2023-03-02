@extends('template')
@section('content')
    <div>
        <h1>Outlets List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Outlet ID</th>
                    <th>Outlet Name</th>
                    <th><a href="{{ route('outlets.create') }}">Add outlet</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outlets as $outlet)
                <tr>
                    <td>{{ $outlet->id }}</td>
                    <td>{{ $outlet->outlet_id }}</td>
                    <td>{{ $outlet->name }}</td>
                    <td><a href="{{ route('outlets.edit', $outlet) }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 