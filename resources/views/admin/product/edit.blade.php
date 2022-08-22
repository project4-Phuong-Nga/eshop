@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$products-> id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="cate_id">
                        <option value="">{{ $products -> category -> name }}</option>

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input onchange="generateSlug(this.value)" type="text" class="form-control" name="name" value="{{ $products -> name }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $products -> slug }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small description</label>
                    <textarea name="small_description" rows="3" class="form-control">{{ $products -> small_description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control"> {{ $products -> description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" class="form-control" name="original_price" value="{{ $products -> original_price }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" class="form-control" name="selling_price" value="{{ $products -> selling_price }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control" name="tax" value="{{ $products -> tax }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="qty" value="{{ $products -> qty }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{ $products -> status == 1 ? 'checked' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" {{$products -> trending == 1 ? 'checked' : '' }}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <textarea type="text" name="meta_title" class="form-control">{{ $products -> meta_title }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{ $products -> meta_keywords }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $products -> meta_description }}</textarea>
                </div>
                @if($products -> image)
                <img src="{{ asset('assets/uploads/products/'.$products -> image) }}" alt="">
                @endif
                <div class="col-md-12">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-outline-success" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var slugGen = function(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to = "aaaaaeeeeeiiiiooooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
    };

    function generateSlug(val) {
        document.getElementById('slug').value = slugGen(val)
    }
</script>

@endsection