@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
<div class="welcome">
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="compare">
            <h4><b>COMPARE MOBILE PHONES</b></h4>
            <form action="{{route('compare_product')}}" method="get" id="compareForm">
            <div class="comparea">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="compare_first" name="p1">
                                <option value="">Select Phone</option>
                                @foreach($datas as $data)
                                <option value="{{$data->id}}" id="{{$data->id}}">{{$data->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="compare_second" name="p2">
                                <option value="">Select Phone</option>
                                @foreach($datas as $data)
                                <option value="{{$data->id}}" id="{{$data->id}}">{{$data->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="compare_third" name="p3">
                                <option value="">Select Phone</option>
                                @foreach($datas as $data)
                                <option value="{{$data->id}}" id="{{$data->id}}">{{$data->product_name}}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                                <select class="compare_fourth" name="p4">
                            <option value="">Select Phone</option>
                                @foreach($datas as $data)
                                <option value="{{$data->id}}" id="{{$data->id}}">{{$data->product_name}}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row compareb">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="compare">COMPARE</button>
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </div>
            </form>
        </div>
        <div class="suggest">
            <h4><b>SUGGESTED MOBILES' COMPARISION </b></h4>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-2 suggestproduct">
                    <img src="{{ asset( 'storage/'.$product->image )}}" alt="image" class="img-responsive"><br>
                    <p>{{$product->product_name}}</p><br>
                    <i class="material-icons">add</i>Add to compare
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    var phone_one, phone_two, phone_three, phone_four;
        $(document).ready(function($) {
            $('.compare_first').selectize();
            $('.compare_second').selectize();
            $('.compare_third').selectize();
            $('.compare_fourth').selectize();
        });
        $(".compare_first").change(function() {
            if($(this).val()) {
                phone_one = $(this).val();
            }
        }); 
        $(".compare_second").change(function() {
            if($(this).val()) {
                phone_two = $(this).val();
            }
        });
        $(".compare_third").change(function() {
            if($(this).val()) {
                phone_three = $(this).val();
            }
        });
        $(".compare_fourth").change(function() {
            if($(this).val()) {
                phone_four = $(this).val();
            }
        });
</script>
<script type="text/javascript" src="{{ asset('js/standalone/selectize.js') }}"></script>
@endsection