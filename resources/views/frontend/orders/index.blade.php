@extends('layouts.app')

@section('title')
MY ORDERS
@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Tracking Number</th>
                                <th>Ordered Date & Time</th>
                                <th>Status</th>
                                <th  colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)

                            <tr style="text-align: center;">
                                <td>{{ $item -> tracking_no}}</td>
                                <td>{{ $item -> created_at }}</td>
                                <td>{{ $item -> status == '0' ? 'pending' : 'completed' }}</td>
                                <td>
                                    <a href="{{ url('vieworder/'.$item->id) }}" class="btn btn-warning">View</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger">Destroy</a>

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
@endsection