@extends('admin.dashboard')
@section('title','Edit Feature')
@section('admin')
<div class="edit_feature">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Feature</h2>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('updatefeature',['id' => $data->id])}}">
                        @csrf
                        <table class="table">
                            <tr>
                                <td>Product Group Id</td>
                                <td><input type="number" name="productgroup_id" value="{{$data->productgroup_id}}" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Feature</td>
                                <td><input type="text" name="feature" value="{{$data->feature}}" class="form-control" style="margin:10px;"></td>
                            </tr>
                            <tr>
                                <td><button type="submit" class="btn btn-primary" style="margin:10px;">Submit</button></td>
                                <td></td>

                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection