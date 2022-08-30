@extends('layouts.admin')

@section('content')

<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card-body">
                    <h5 class=" mb-0">{{ $categories }} <span class="float-right"><i class="fa fa-book"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0  small-font">Total Categories</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class=" mb-0">{{ $products }} <span class="float-right"><i class="fa fa-laptop"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0  small-font">Total Products </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class=" mb-0">{{ $orders }} <span class="float-right"><i class="fa fa-credit-card-alt"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0  small-font">Total Orders</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                    <h5 class=" mb-0">{{ $users }}<span class="float-right"><i class="fa fa-user-circle"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:55%"></div>
                    </div>
                    <p class="mb-0  small-font">Total Users</p>
                </div>
            </div>
        </div>





    </div>
    <!--End Row-->
    <div class="col-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">Weekly sales
                <div class="card-action">
                    <div class="dropdown">
                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                            <i class="icon-options"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void();">Action</a>
                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-2">
                    <canvas id="chart2"></canvas>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center">
                    <tbody>
                        <tr>
                            <td><i class="fa fa-circle  mr-2"></i> Direct</td>
                            <td>$5856</td>
                            <td>+55%</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle text-light-1 mr-2"></i>Affiliate</td>
                            <td>$2602</td>
                            <td>+25%</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle text-light-2 mr-2"></i>E-mail</td>
                            <td>$1802</td>
                            <td>+15%</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle text-light-3 mr-2"></i>Other</td>
                            <td>$1105</td>
                            <td>+5%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid page-body-wrapper">
            <div class="card">
                <div class="card-header">Products
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-borderless">
                        <thead style="padding: 10px;padding-right: 100px;text-align: center">
                            <tr>
                                <th>Product</th>
                                <th>Photo</th>
                                <th>Amount</th>
                                <th>Small Description</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 10px;padding-right: 100px;text-align: center">
                            @foreach ($get_products as $item)

                            <tr>
                                <td>{{ $item -> name}}</td>
                                <td><img src="{{ asset('assets/uploads/products/'.$item->image ) }}" width="100px" alt="Product Image"></td>
                                <td>{{$item -> qty }}</td>
                                <td>{{ Str::limit($item -> small_description, 50) }}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->


    @endsection