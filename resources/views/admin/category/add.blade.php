@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input onchange="generateSlug(this.value)" type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" id="slug" class="form-control" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <textarea type="text" name="meta_title" class="form-control"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>
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

        // remove accents, swap ?? for n, etc
        var from = "?????????????????????????????????????????????????????/_,:;";
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