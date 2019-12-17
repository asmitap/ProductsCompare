@extends('layouts.app')
@section('content')
<div class="compare_product">
  <div class="container">
    <h3>Compare between products</h3>
    <div class="top_content">
      <div class="row">
        <div class="col-md-2 selected">
          <b>Comparison Criteria</b>
        </div>
        <div class="col-md-2 selected">
          @if(isset($firstdata))
          <p><b>{{$firstdata->product_name}}</b></p><br>
          <img src="{{ asset( 'storage/'.$firstdata->image )}}">
          @endif
        </div>
        <div class="col-md-2 selected">
          @if(isset($seconddata))
          <p><b>{{$seconddata->product_name}}</b></p><br>
          <img src="{{ asset( 'storage/'.$seconddata->image )}}">
          @endif
        </div>
        <div class="col-md-2 selected">
          @if(isset($thirddata))
          <p><b>{{$thirddata->product_name}}</b></p><br>
          <img src="{{ asset( 'storage/'.$thirddata->image )}}">
          @endif
        </div>
        <div class="col-md-2 selected">
          @if(isset($fourthdata))
          <p><b>{{$fourthdata->product_name}}</b></p><br>
          <img src="{{ asset( 'storage/'.$fourthdata->image )}}">
          @endif
        </div>
      </div>
    </div>

    <div class="accordion" id="gname" style="margin-top:50px;">
      <!-- @php print_r($data); @endphp -->
      @foreach($data as $index => $groupdata)
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" id="{{$groupdata['id']}}" type="button" data-toggle="collapse" data-target="#tab-{{$groupdata['id']}}" aria-expanded="true" aria-controls="collapseOne">
              <i class="fa fa-plus-square"></i> <b>{{$groupdata['group_name']}}</b>
            </button>
            </h2>
          </div>
          <div id="tab-{{$groupdata['id']}}" class="collapse {{$index == 0 ? 'show':''}} py-2" aria-labelledby="headingOne" data-parent="#gname">
            <div class="table">
              @foreach($groupdata['features'] as $tdvalue)
              <div class="row">
                @foreach($tdvalue as $f)
                  <div class="col-md-2 featurea"> {{ $f }} </div>
                @endforeach
              </div>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<script>

</script>
@endsection