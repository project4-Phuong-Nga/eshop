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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <div class="card">
        <div class="card-body">

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <a style="color: black" href="/products">
                        <div style="background-color: #9c27b0; color:white" class=" rounded d-flex align-items-center justify-content-between p-4">
                            <h1> <i class="fa fa-snowflake-o"></i>
                            </h1>
                            <div class="ms-3">
                                <h4 class="mb-2">Sản phẩm</h4>
                                <h4 class="mb-0" style="text-align: center">
                                @php
                                    echo ($product);
                                @endphp
                                </h4>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <a style="color: black" href="/categories">
                        <div style="background-color: #9c27b0; color:white" class=" rounded d-flex align-items-center justify-content-between p-4">
                            <h1><i class="fa fa-bar-chart"></i></h1>
                            <div class="ms-3">
                                <h4 class="mb-2">Loại sản phẩm</h4>
                                <h4 class="mb-0" style="text-align: center">@php
                                    echo ($categorie);
                                @endphp</h4>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <a style="color: black" href="/orders">
                        <div style="background-color: #9c27b0; color:white" class=" rounded d-flex align-items-center justify-content-between p-4">
                            <h1><i class="fa fa-shopping-basket"></i></h1>
                            <div class="ms-3">
                                <h4 class="mb-2">Đơn hàng</h4>
                                <h4 class="mb-0" style="text-align: center">@php
                                    echo ($order);
                                @endphp</h4>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div style="background-color: #9c27b0; color:white" class=" rounded d-flex align-items-center justify-content-between p-4">
                            <h1><i class="fa fa-area-chart"></i></h1>
                            <div class="ms-3">
                                <h4 class="mb-2">Tổng tiền</h4>
                                <h4 class="mb-0">@php
                                    echo ($total);
                                @endphp</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <h1>Thống kê doanh thu</h1> 
            
            <br> <br>
            <div id="myfirstchart" style="height: 250px;"></div>
            <script>
                $(document).ready(function() {
                    var chart = new Morris.Line({
                        element: 'myfirstchart',
                        data: [<?php
                            if (isset($data)) {
                                foreach ($data as $item) {
                                    echo "{'ngay':'" . $item->ngay . "','tongtien':" . $item->tongtien . ",},";
                                }
                            }
                            ?>],
                        xkey: 'ngay',
                        ykeys: ['tongtien'],
                        labels: ['Tổng tiền']
                        });
                });
            </script>
            <h3>Các sản phẩm bán chạy</h3>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            @foreach($productsell as $item)
                <tr>
                    <td>{{ $item -> prod_id }}</td>
                    <td>{{ $item -> name }}</td>
                    <td>{{ $item -> description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/products/'.$item -> image) }}" class="cate-image" alt="Image here"> 
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

        <div class="card">
            <div class="card-header">Selling Products
            </div>
            <div class="card-body">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>

            <div class="row m-0 row-group text-center border-top border-light-3">
                <div class="col-12 col-lg-4">
                    <div class="p-3">
                        <h5 class="mb-0">{{ $users }}</h5>
                        <small class="mb-0">Total Users <span></small>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="p-3">
                        <h5 class="mb-0">{{ $products }}</h5>
                        <small class="mb-0">Total Products <span> </small>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="p-3">
                        <h5 class="mb-0">{{ $orders }}</h5>
                        <small class="mb-0">Total Orders <span></small>
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