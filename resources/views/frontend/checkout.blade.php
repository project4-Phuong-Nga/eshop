@extends('layouts.app')

@section('title')
CHECKOUT
@endsection

@section('content')

<div class="container mt-3">
    <form action="{{ url('place-order') }}" method="POST" enctype="multipart/form-data">
        <!-- {{ csrf_field() }} -->
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control firstname" value="{{ Auth::user() -> name }}" name="fname" placeholder="Enter First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control lastname" value="{{ Auth::user() -> lname }}" name="lname" placeholder="Enter Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control email" value="{{ Auth::user() -> email }}" name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control phone" value="{{ Auth::user() -> phone }}" name="phone" placeholder="Enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control address1" value="{{ Auth::user() -> address1 }}" name="address1" placeholder="Enter Address 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control address2" value="{{ Auth::user() -> address2 }}" name="address2" placeholder="Enter Address 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control city" value="{{ Auth::user() -> city }}" name="city" placeholder="Enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control state" value="{{ Auth::user() -> state }}" name="state" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" class="form-control country" value="{{ Auth::user() -> country }}" name="country" placeholder="Enter Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="text" class="form-control pincode" value="{{ Auth::user() -> pincode }}" name="pincode" placeholder="Enter Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        Order Details
                    </div>
                    <hr>
                    @if($cartitems -> count() > 0)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                $total_per_product = 0;
                                $total = 0;
                                @endphp
                            @foreach ($cartitems as $item)
                            <tr>
                                <td>{{ $item->products->name }}</td>
                                <td>{{ $item->prod_qty }}</td>
                                <td>
                                    <!-- {{ $item->products->selling_price }} -->
                                @php
                                $total_per_product += $item-> products->selling_price * $item->prod_qty ;
                                @endphp
                                {{ $total_per_product }}
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    
                    @php
                                    $total += $total_per_product;
                                    @endphp
                                    <h3>Total price: {{ $total }}</h3>
                                    <br>
                                    
                    <button type="submit" class="btn btn-warning w-100 float-end">Cash on delivery</button>
                    <!-- <br>
                    <a href="{{ url('/vnpay_payment') }}" type="button" class="btn btn-warning w-100 float-end">Pay now </a> -->
                    <br>

                    <!-- paying by card -->
                    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-rocket"></i> Pay Now
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
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
                                                        <div class="d-flex flex-row">
                                                            <div class="inputbox"> <input type="number" name="name" class="form-control" required="required" value="{{ $total }}"> <span>Purchase Total</span> </div>
                                                        </div>
                                                        <p style="text-align: center; color: red;">!Please check your informations carefully before buying</p>
                                                        <div class="px-5 pay"> <button type="submit" class="btn btn-success btn-block ">Buy</button> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else
                    <h4 class="text-center">No products in cart</h4>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>

@endsection