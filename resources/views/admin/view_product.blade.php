@extends('admin.dashboard')
@section('admin')
    <div class="container">
        <div class="viewproduct">
        <table class="table" style="margin-top:15px;">
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($products as $datas)
            <tr>
                <td>{{$datas->product_name}}</td>
                <td><img src="{{ asset( 'storage/'.$datas->image )}}" height="100px" width="100px"></td>
                <td>{{$datas->description}}</td>
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
        
        </div>
    </div>
@endsection

