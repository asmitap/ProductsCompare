@extends('admin.dashboard')
@section('admin')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

<div class="product">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b> Product Form </b>
                        <div class="message"></div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="productform" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="product_name" class="form-control" placeholder="Enter product name"><br>
                            <div class="error product_name btn-danger"> </div>

                            <input type="file" name="image" id="image" class="form-control" placeholder="Upload Image"><br>
                            <div class="error image btn-danger"> </div>

                            <textarea class="form-control description" name="description"></textarea>

                            <div class="form-group" style="margin-top:30px;">
                                <h2> Select Variants </h2>
                                <select class="multiple_select form-control" name="variants[]" multiple="multiple">
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="accordion" id="gname" style="margin-top:50px;">
                                @foreach($datas as $index => $groupdata)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" id="{{$groupdata['id']}}" type="button" data-toggle="collapse" data-target="#tab-{{$groupdata['id']}}" aria-expanded="true" aria-controls="collapseOne">
                                                {{$groupdata['group_name']}}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="tab-{{$groupdata['id']}}" class="collapse {{$index == 0 ? 'show':''}} py-2" aria-labelledby="headingOne" data-parent="#gname">
                                        @foreach($groupdata['features'] as $feature)
                                        <div class="featurename form-group px-4">
                                            {{$feature['feature']}} :
                                            <input type="hidden" name="keys[]" id="{{$feature['id']}}" value=" {{$feature['feature']}}">
                                            <input type="text" name="values[]" value="" id="{{$feature['id']}}" class="form-control">
                                            <input type="hidden" name="group_id[]" id="{{$groupdata['id']}}" value=" {{$groupdata['id']}}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div><br>


                            <button type="submit" name="submit" class="btn btn-primary upload-image"> Submit </button>
                            <a href="{{route('viewproduct')}}" class="btn btn-primary upload-image"> View Product </a>

                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
<script>
    $(document).ready(function($) {
        $(document).ready(function() {
            $('.multiple_select').select2();
        });
        $('.productform').submit(function(e) {
            var fd = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            let self = this;
            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/storeproduct',
                data: fd,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    location.reload();
                    $('.message').html(res.msg);
                },
                error: function(err) {
                    if (err && err.status === 422) {
                        let errors = err.responseJSON.errors;
                        for (let error in errors) {
                            $(`.${error}`).text(errors[error][0]);
                        }
                    } else {
                        console.log(err);
                    }

                    console.log(err);
                }
            });
        });
    });

    $(document).ready(function() {
        $('.description').summernote({
            height: 300,
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
@endsection