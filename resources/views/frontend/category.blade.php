@extends('layouts.app')

@section('title')
Category
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Category</h2>
                <div class="row">
                    @foreach($category as $cate)
                    <div class="col-md-4 mb-3">
                        <a href="{{ url('category/'.$cate -> slug) }}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/category/'.$cate -> image) }}" alt="Category Image">
                            <div class="card-body">
                                {{ $cate -> description }}
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