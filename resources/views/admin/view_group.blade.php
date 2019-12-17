@extends('admin.dashboard')
@section('title', 'Group')
@section('admin')
    <div class="container">
        <div class="view_group">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <!-- <a href="{{route('addgroup')}}" type="button" class="btn btn-primary" >
  Add Group
</a> -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:10px;">
  Add Group
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  class="addGroupForm">
            
            <input type="text" name="productgroup" placeholder="Enter group name" class="form-control">
            <span class="error" id="error" style="font-size:15px;color:red;display:block;font-weight:bold;"></span>
            <button  class="btn btn-primary addgroup" style="margin:10px">Save </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary addgroup">Save </button> -->
      </div>
    </div>
  </div>
</div>



        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Group Name</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>

                <th><a href="/storefeature/{{$data->id}}" style="text-decoration:none;">{{$data->productgroup}}</a></th>


                <th>
                    <a href="{{route('editgroup',['id' => $data->id])}}" class="btn btn-primary btn-sm"> Edit <i class="material-icons" style="font-size:15px; padding-left:-10px;">edit</i></a>
                    <a href="{{route('deletegroup',['id' => $data->id])}}" class="btn btn-danger btn-sm"> Delete <i class="material-icons" style="font-size:15px; padding:-10px;">delete</i></a>
                </th>
                
                </tr>
                @endforeach
            </tbody>
            </table>

        </div>
    </div>
    <script>
    $(document).ready(function ($) {

    $('.addGroupForm').submit(function (e) {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              //'Authorization':'Bearer +token',
          }
        });
        e.preventDefault();
        let self = this;
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1:8000/storegroup',
            //data: {productgroup:$(self).serialize(), _token: '{{ csrf_token() }}' },
            data:$(self).serialize(),
            dataType: 'json',
            success: function (res) {
                location.reload();
                // $('.timein_response').html(res.msg);
            },
            error:function(err){
                $('#error').html(err.responseJSON.errors.productgroup[0]);
                console.log(err.responseJSON.errors.productgroup[0]);
            }
        });
    });
}); 
</script>

@endsection