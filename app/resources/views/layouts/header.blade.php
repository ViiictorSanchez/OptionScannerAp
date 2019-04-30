@section('css')
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

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
                                <a class="menu-color" id="list-header-menu">
                                    @if(isset($typeAccount))
                                        <strong>
                                            {{$typeAccount[0]['classification']}} {{$account[0]}}
                                        </strong><i class="fas fa-sort-down"></i></a>
                                @endif

                                <ul class="submenu">
                                    {{--                            @php $count = sizeof($account) @endphp--}}
                                    {{--                            @for ($i = 0; $i < $count; $i++)--}}
                                    {{--                                <li><a class="menu-color" id="{{$account[$i]}}"--}}
                                    {{--                                    onclick="changeBalance(this)"><strong>{{$typeAccount[$i]['classification']}} {{$account[$i]}}</strong></a></li>--}}
                                    {{--                            @endfor--}}
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
    <!-- end topbar-main -->

    <div class="container-fluid p-0">
        <!-- Page-Title -->
        <div class="row w-100 m-0" class="align-menu-graph">
            <!-- problemas al centrar las graficas 1270 px a 1500px -->
            <div class="col-md-12 p-0">
                <div class="page-title-box">
                    <div class="row w-100 mx-auto charts-slide" id="running-line">
                        @if(isset($spy_price))
                            @foreach($spy_price['quotes']['quote'] as $test)
                                <div class="slide">
                                    <div class="panel panel-default">
                                        <div class="panel-thumbnail">
                                            <div class="state-graph">
                                                <div class="line-separate-graph">
                                                    <div id="morris-area-example-{{$loop->index}}" class="morris-chart-height margin-first-graph margin-graph area-graph"></div>

                                                    <label class="title-graph" id="{{$test['symbol']}}">{{$test['symbol']}}

                                                        <p @if($test['change_percentage'] < 0) class="red" @elseif($test['change_percentage'] > 0) class="green" @endif>
                                                            @if(!$test['last'])
                                                                -
                                                            @elseif($test['last'])
                                                                ${{$test['last']}}
                                                            @endif

                                                            <br>
                                                            @if(!$test['change'])
                                                                -
                                                            @elseif($test['change'])
                                                                ${{$test['change']}}
                                                            @endif

                                                            @if(!$test['change_percentage'])
                                                                -
                                                            @elseif($test['change_percentage'])
                                                                ( {{$test['change_percentage']}}% )
                                                            @endif
                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                    </div>
                </div>

                <!-- MENU Start -->

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu line-bottom">

                        <li class="has-submenu principal-menu-distance">
                            <a class="color-principal-menu" href="index" >
                                <strong>Saved Screeners</strong>
                            </a>
                            <ul class="submenu">
                                <li><a href={{route('stockprofile')}}>StockProfile</a></li>

                            </ul>
                        </li>

                        <li class="has-submenu principal-menu-distance">
                            <a href="#" class="color-principal-menu"><strong>Stock Screeners</strong></a>
                            <ul class="submenu">
                                <li><a href="email-inbox">Inbox</a></li>
                                <li><a href="email-read">Email Read</a></li>
                                <li><a href="email-compose">Email Compose</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu principal-menu-distance">
                            <a href="#" class="color-principal-menu"><strong>Option Screeners</strong></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="ui-alerts">Alerts</a></li>
                                        <li><a href="ui-buttons">Buttons</a></li>
                                        <li><a href="ui-badge">Badge</a></li>
                                        <li><a href="ui-cards">Cards</a></li>
                                        <li><a href="ui-carousel">Carousel</a></li>
                                        <li><a href="ui-dropdowns">Dropdowns</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="ui-grid">Grid</a></li>
                                        <li><a href="ui-images">Images</a></li>
                                        <li><a href="ui-lightbox">Lightbox</a></li>
                                        <li><a href="ui-modals">Modals</a></li>
                                        <li><a href="ui-pagination">Pagination</a></li>
                                        <li><a href="ui-popover-tooltips">Popover & Tooltips</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="ui-progressbars">Progress Bars</a></li>
                                        <li><a href="ui-sweet-alert">Sweet-Alert</a></li>
                                        <li><a href="ui-tabs-accordions">Tabs &amp; Accordions</a></li>
                                        <li><a href="ui-typography">Typography</a></li>
                                        <li><a href="ui-video">Video</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu principal-menu-distance">
                            <a href="#" class="color-principal-menu"><strong>Index Screeners</strong></a>
                            <ul class="submenu">
                                <li><a href="form-elements">Elements</a></li>
                                <li><a href="form-validation">Validation</a></li>
                                <li><a href="form-advanced">Advanced</a></li>
                                <li><a href="form-editors">Editors</a></li>
                                <li><a href="form-uploads">File Upload</a></li>
                                <li><a href="form-xeditable">Xeditable</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu principal-menu-distance">
                            <a href="#" class="color-principal-menu"><strong>Stock Scans</strong></a>
                            <ul class="submenu">
                                <li>
                                    <a href="calendar">Calendar</a>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">Icons</a>
                                    <ul class="submenu">
                                        <li><a href="icons-material">Material Design</a></li>
                                        <li><a href="icons-ion">Ion Icons</a></li>
                                        <li><a href="icons-fontawesome">Font Awesome</a></li>
                                        <li><a href="icons-themify">Themify Icons</a></li>
                                        <li><a href="icons-dripicons">Dripicons</a></li>
                                        <li><a href="icons-typicons">Typicons Icons</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">Tables </a>
                                    <ul class="submenu">
                                        <li><a href="tables-basic">Basic Tables</a></li>
                                        <li><a href="tables-datatable">Data Table</a></li>
                                        <li><a href="tables-responsive">Responsive Table</a></li>
                                        <li><a href="tables-editable">Editable Table</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">Maps</a>
                                    <ul class="submenu">
                                        <li><a href="maps-google"> Google Map</a></li>
                                        <li><a href="maps-vector"> Vector Map</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="rangeslider">Range Slider</a>
                                </li>
                                <li>
                                    <a href="session-timeout">Session Timeout</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu principal-menu-distance">
                            <a href="#" class="color-principal-menu"><strong>Option Scans</strong></a>
                            <ul class="submenu">
                                <li><a href="charts-morris">Morris Chart</a></li>
                                <li><a href="charts-chartist">Chartist Chart</a></li>
                                <li><a href="charts-chartjs">Chartjs Chart</a></li>
                                <li><a href="charts-flot">Flot Chart</a></li>
                                <li><a href="charts-c3">C3 Chart</a></li>
                                <li><a href="charts-other">Jquery Knob Chart</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu principal-menu-distance">
                            <a href="#" class="color-principal-menu"><strong>LEAPS</strong></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="pages-timeline">Timeline</a></li>
                                        <li><a href="pages-invoice">Invoice</a></li>
                                        <li><a href="pages-directory">Directory</a></li>
                                        <li><a href="pages-login">Login</a></li>
                                        <li><a href="pages-register">Register</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="pages-recoverpw">Recover Password</a></li>
                                        <li><a href="pages-lock-screen">Lock Screen</a></li>
                                        <li><a href="pages-blank">Blank Page</a></li>
                                        <li><a href="pages-404">Error 404</a></li>
                                        <li><a href="pages-500">Error 500</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--  Sectors Agregate-->
                        <li class="has-submenu">
                            <a href="#" class="color-principal-menu"><strong>Sectors</strong></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="pages-timeline">Timeline</a></li>
                                        <li><a href="pages-invoice">Invoice</a></li>
                                        <li><a href="pages-directory">Directory</a></li>
                                        <li><a href="pages-login">Login</a></li>
                                        <li><a href="pages-register">Register</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="pages-recoverpw">Recover Password</a></li>
                                        <li><a href="pages-lock-screen">Lock Screen</a></li>
                                        <li><a href="pages-blank">Blank Page</a></li>
                                        <li><a href="pages-404">Error 404</a></li>
                                        <li><a href="pages-500">Error 500</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end navigation -->

            </div>
        </div>

    </div>


</header>
<!-- End Navigation Bar-->
@section('script')
    <!-- switch color Theme -->
    <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
    <script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
@endsection