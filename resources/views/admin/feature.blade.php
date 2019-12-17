@extends('admin.dashboard')
@section('title', 'Features')

@section('admin')

<div class="feature">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="summary">
            <div class="card">
                <h5 class="card-header">{{$data->productgroup}}</h5>

                <div class="card-body">
                    <div class="input_fields_container_part">

                        <form class="addattribute mb-4">
                            <div class="form-row">
                                <div class="col-7">
                                    <input type="hidden" name="productgroup_id" value="{{$data->id}}">
                                    <input type="text" name="feature" class="form-control" minlength="4" required>
                                    <span class="error" id="error" style="font-size:15px;color:red;display:block;font-weight:bold;"></span>
                                </div>
                                <div class="col-5">
                                    <button type="submit" name="submit" class="btn btn-primary"> Add </button>
                                </div>
                            </div>

                        </form>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Feature Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($featur as $row)
                                <tr>
                                    <td>{{$row->feature}}</td>
                                    <td><a href="/editfeature/{{$row->id}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="/deletefeature/{{$row->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.addattribute').submit(function(e) {
            //console.log( $( this ).serializeArray() );
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //'Authorization':'Bearer +token',
                }
            });

            let self = this;
            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/storefeature',
                //data: {productgroup:$(self).serialize(), _token: '{{ csrf_token() }}' },
                data: $(self).serialize(),
                dataType: 'json',
                success: function(res) {
                    $('.table tbody').append(`
                        <tr>
                            <td>${res.feature}</td>
                            <td><button class="btn btn-primary btn-sm">Edit</button><button class="btn btn-danger btn-sm">Delete</button></td>
                        </tr>
                    `);
                    // location.reload();
                    // $('.timein_response').html(res.msg);
                },
                error: function(err) {
                    $('#error').html(err.responseJSON.errors.productgroup[0]);
                    console.log(err.responseJSON.errors.productgroup[0]);
                }
            });
        });
    });
</script>

@endsection