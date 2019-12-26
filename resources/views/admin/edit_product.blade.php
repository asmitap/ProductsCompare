@extends('admin.dashboard')
@section('title','Edit Product')
@section('admin')
<div class="editproduct">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <b>Edit Product</b>
                <div class="message"></div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('updateProduct',['id' => $data->id])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="product_name" class="form-control" value="{{$data->product_name}}"><br>
                    <div class="error product_name btn-danger"> </div>

                    <input type="file" name="image" id="image" class="form-control" value="{{$data->image}}"><br>
                    <div class="error image btn-danger"> </div>

                    <textarea class="form-control description" name="description">{{$data->description}}</textarea>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Edit Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection