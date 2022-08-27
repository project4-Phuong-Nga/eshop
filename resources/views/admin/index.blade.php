@extends('layouts.admin')

@section('content')
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
@endsection