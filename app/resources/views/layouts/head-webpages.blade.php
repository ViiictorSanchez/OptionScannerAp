<meta content="Admin Dashboard" name="description" />
<meta content="Themesbrand" name="author" />
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">

@yield('css')

<link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main" id="topnavlogo">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-5 h-100">
                    <div class="row h-100">
                        <div class="col-lg-5 h-100 d-flex align-items-center">
                            <div class="logo" >

                                <a href="index" class="logo">
                                    <img src="/assets/images/logo-sm.ico" alt="" class="logo-small">
                                    <img id="imagelogo" src="/assets/images/logo.png" alt="" class="logo-large">
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-7 d-flex align-items-center">
                            <div class="dropdown notification-list d-none d-sm-block form-distance" >
                                <form role="search">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                                        <input type="text" class="form-control"  placeholder="Symbol">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 h-100">
                    <div class="menu-extras topbar-custom h-100">
                        <ul class="float-right list-unstyled mb-0 navigation-menu" id="header-menu">
                            <li class="float-right list-unstyled mb-0" >
                                <div class="margin-menu-top"  >
                                    <a id="demo" onclick="switchfunction()">Click to change theme color.</a>
                                </div>
                            </li>
                            <li class="float-right list-unstyled mb-0 ">
                                <div class="margin-menu-top"  >
                                    <a class="menu-color" href="#"><strong>Home</strong></a>
                                </div>
                            </li>
                            <li class="float-right list-unstyled mb-0 ">
                                <div class="margin-menu-top"  >
                                    <a class="menu-color" href="#"><strong>Trade</strong></a>
                                </div>
                            </li>
                            <li class="float-right list-unstyled mb-0 ">
                                <div class="margin-menu-top"  >
                                    <a class="menu-color" href="#"><strong>Gains</strong></a>
                                </div>
                            </li>
                            <li class="float-right list-unstyled mb-0 ">
                                <div class="margin-menu-top"  >
                                    <a class="menu-color" href="#"><strong>History</strong></a>
                                </div>
                            </li>
                            <li class="float-right list-unstyled mb-0 has-submenu ">
                                <a class="menu-color" id="list-header-menu"><strong>{{$typeAccount[0]['classification']}} {{$account[0]}}</strong><i class="fas fa-sort-down"></i></a>
                                <ul class="submenu">
                                    @php $count = sizeof($account) @endphp
                                    @for ($i = 0; $i < $count; $i++)
                                        <li><a class="menu-color" id="{{$account[$i]}}"
                                               onclick="changeGains(this)"><strong>{{$typeAccount[$i]['classification']}} {{$account[$i]}}</strong></a></li>
                                    @endfor
                                    <li><a href="#" > <i class="fas fa-question-circle"></i> Help <br></a></li>
                                    <li><a href="#"> <i class="fas fa-wrench"></i>Report Bug</a></li>
                                    <li><a href="#"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                </ul>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
</header>
<!-- End Navigation Bar-->
@section('script')
    <!-- switch color Theme -->
    <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
    <script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
@endsection
