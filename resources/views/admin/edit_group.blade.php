@extends('admin.dashboard')
@section('admin')
<div class="container">


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="add_group">
        <h2>Update Group</h2><br>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <form method="post" action="{{route('updategroup',['id' => $datas->id])}}">
                @csrf
                <input type="text" name="productgroup" placeholder="Enter Group Name" value="{{$datas->productgroup}}" class="form-control @error('productgroup') is-invalid @enderror"><br>
                @error('productgroup')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>

        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>
@endsection