@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Registered users</h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{ $item -> id }}</td>
                    <td>{{ $item -> name }}
                    <!-- @foreach($orders as $order)
                        {{ $order -> lname }}
                    @endforeach -->
                    </td>
                    <td>{{ $item -> email }}</td>
                    @foreach($orders as $order)
                    <td>{{ $order -> phone }}</td>
                    @endforeach
                    <td>
                        <a href="{{ url('view-user/'.$item -> id) }}" class="btn btn-warning">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection