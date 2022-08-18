@extends('layouts.app')

@section('title')
{{ $category -> name }}
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
            </a>/
            <a href="{{ url('category/'.$category->slug) }}">
            {{ $category -> name }}
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category -> name }}</h2>
            <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($products as $prod)
            <div class="item">
                <div class="card" style="margin: 20px; height: 400px;">
                    <a href="{{ url('category/'.$category -> slug.'/'.$prod -> slug) }}">
                        <img style="height: 200px; padding: 20px;" src="{{ asset('assets/uploads/products/'.$prod -> image) }}" alt="Product Image">
                        <div class="card-body" >
                            <h5>{{ $prod -> name }}</h5>
                            <span class="float-start">{{ $prod -> selling_price }}</span>
                            <span class="float-end"><s>{{ $prod -> original_price }}</s></span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
</script>
@endsection