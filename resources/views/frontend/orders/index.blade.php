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
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)

                                    <tr style="text-align: center;">
                                        <td>{{ $item -> tracking_no}}</td>
                                        <td>{{ $item -> created_at }}</td>
                                        <td>Tienef</td>
                                        <td>
                                            @if ($item -> status == '0')
                                                @if ($item -> payment_method == 0)
                                                    New
                                                @elseif ($item -> payment_method == 1)
                                                    Waiting payment
                                                @endif
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
                                        @if ($item -> status == '0' && $item -> payment_method == 1)
                                            <td>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pay Now</a>
                                            </td>
                                        @endif
                                        @if ($item -> status == '0')
                                            <td>
                                                <form action="{{ url('destroy/'.$item -> id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
{{-- order_audits: luu ls cua viec chuyen trang thai 
    // thoi gian
    // trang thai
    --}}
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-right"> <i class="fa fa-close close" data-bs-dismiss="modal"></i> </div>
                    <div class="tabs ">
                        <div class="text-center">
                            <h5>QR Code</h5>
                        </div>
                        <img src="{{ asset('assets/images/qr_code.png') }}" height="90px" width="90px" style="margin-left: 40%; ">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                                <div class="mt-4 mx-4">
                                    <div class="text-center">
                                        <h5>Credit card</h5>
                                    </div>
                                    <div class="form mt-3">
                                        <div class="inputbox"> Bank: TP Bank</div>
                                        <div class="inputbox"> Card Number: 123456789 </div>
                                        <div class="inputbox"> Example content: "Thanh toan don hang sharma5824"
                                        </div>
                                        <p style="text-align: center; color: red;">!Please check your informations carefully before buying</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection