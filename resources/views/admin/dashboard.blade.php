@extends('layouts.app')
@section('content')
<div class="dashboard">
<div class="container-fluid">
<div class="row">
    <div class="col-md-4">
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
            </div>

            <ul class="list-unstyled components">
                <h2> <a href="{{route('admindashboard')}}"> Dashboard </a> </h2>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Group</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a class="dropdown-item" href="{{route('viewgroup')}}"> View Group </a>
                        </li>
                       
                    </ul>
                </li>


                <li>
                    <a class="nav-link" href="{{route('product')}}"> Product </a>
                </li>
            </ul>
        </nav>

    </div>
    </div>
    <div class="col-md-8 dashboarda">
    @yield('admin')
    </div>
</div>


</div>    
</div>
<script>
    $(document).ready(function() {

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });

    });
</script>


@endsection