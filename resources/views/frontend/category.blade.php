@extends('layouts.app')

@section('title')
Category
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Home
            </a> /
            <a href="{{ url('category') }}">
                Category
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Category</h2>
                <div class="row">
                    @foreach($category as $cate)
                    <div class="col-md-4 mb-3">
                        <a href="{{ url('category/'.$cate -> slug) }}">
                        <div class="card" style="margin: 20px; height: 400px;">
                            <img style="height: 200px; padding: 20px;" src="{{ asset('assets/uploads/category/'.$cate -> image) }}" alt="Category Image">
                            <div class="card-body">
                                {{ $cate -> name }}
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection