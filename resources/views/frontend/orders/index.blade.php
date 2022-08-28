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
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr style="text-align: center;">
                                        <td>{{ $item->tracking_no }}</td>
                                        @foreach ($cartitems as $item)
                                            <td>{{ $item->products->selling_price }}</td>
                                        @endforeach
                                        <td>
                                            @if ($item->status == '0')
                                                pending
                                            @elseif($item->status == '1')
                                                cancel
                                            @else
                                                completed
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('vieworder/' . $item->id) }}" class="btn btn-warning">View</a>
                                        </td>
                                        <td>
                                            @if ($item->status == '0')
                                                <a href="{{ url('destroy-order/' . $item->id) }}"
                                                    class="btn btn-danger">Cancel</a>
                                            @endif
                                        </td>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Tracking Number</th>
                                <th>Ordered Date & Time</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)

                            <tr style="text-align: center;">
                                <td>{{ $item -> tracking_no}}</td>
                                <td>{{ $item -> created_at }}</td>
                                <td>
                                    <!-- {{ $item -> status == '0' ? 'pending' : 'completed' }} -->
                                    @if ($item -> status == '0')
                                    Waiting payment
                                    @elseif ($item -> status == '1')
                                    Paymented
                                    @elseif ($item -> status == '2')
                                    Delivering
                                    @elseif ($item -> status == '3')
                                    Completed
                                    @elseif ($item -> status == '4')
                                    Cancel
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('vieworder/'.$item->id) }}" class="btn btn-warning">View</a>
                                </td>
                                <td>
                                    <!-- <a href="{{ url('destroy/'.$item->id) }}" class="btn btn-danger">Destroy</a> -->
                                    <form action="{{ url('destroy/'.$item -> id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Destroy</button>
                                    </form>
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
