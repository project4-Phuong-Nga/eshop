@extends('layouts.admin')


@section('title')
Orders
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)

                                <tr>
                                    <td>
                                        {{ date('d-m-Y', strtotime($item -> created_at)) }}
                                    </td>
                                    <td>{{ $item -> tracking_no}}</td>
                                    <td>{{ $item-> price }}</td>
                                    <td>
                                    @if ($item -> status == '4')
                                            Canceled     
                                    @endif                               
                                    </td>
                                    <td>
                                        <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-warning">View</a>
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