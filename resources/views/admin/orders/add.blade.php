@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Orders</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-orders') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">First Name</label>
                    <input type="text" id="slug" class="form-control" name="fname">

                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Last Name</label>
                    <input type="text" id="slug" class="form-control" name="lname">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Email</label>
                    <input type="text" id="slug" class="form-control" name="email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Phone</label>
                    <input type="text" id="slug" class="form-control" name="phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Address 1</label>
                    <input type="text" id="slug" class="form-control" name="address1">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Address 2</label>
                    <input type="text" id="slug" class="form-control" name="address2">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">City</label>
                    <input type="text" id="slug" class="form-control" name="city">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">State</label>
                    <input type="text" id="slug" class="form-control" name="state">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Country</label>
                    <input type="text" id="slug" class="form-control" name="country">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Pincode</label>
                    <input type="text" id="slug" class="form-control" name="pincode">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Status</label>
                    <input type="text" id="slug" class="form-control" name="status">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Message</label>
                    <input type="text" id="slug" class="form-control" name="message">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Tracking No</label>
                    <input type="text" id="slug" class="form-control" name="tracking_no">
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