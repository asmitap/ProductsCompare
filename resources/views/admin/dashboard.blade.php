@extends('layouts.app')
@section('content')
<div class="container">
    <div class="dashboard">
        <div class="row">
            <div class="col-md-4 sidebar">
                <div class="title">
                    <h2> <a href="{{route('admindashboard')}}"> Dashboard </a> </h2>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" href="#"> Group </a>
                        <div class="dropdown-menu">
                            <span class="dropdown-item-text"></span>
                            <a class="dropdown-item" href="{{route('viewgroup')}}"> View Group </a>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product')}}"> Product </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-8">
                @yield('admin')
            </div>

        </div>

    </div>

</div>
@endsection