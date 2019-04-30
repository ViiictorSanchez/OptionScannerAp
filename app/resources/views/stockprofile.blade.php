@extends('layouts.master', ['spy_price'=>$spy_price, 'account'=>$account, 'typeAccount'=>$typeAccount])

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

@section('breadcrumb')
    <h4 class="page-title">Flot Chart</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Lexa</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Charts</a></li>
        <li class="breadcrumb-item active">Flot Chart</li>
    </ol>

@endsection

@section('content')
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <!-- left side -->
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Realtime Statistics</h4>
                                    <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                                        <li class="list-inline-item">
                                            <h5 class="mb-0">365214</h5>
                                            <p class="text-muted font-14">Activated</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="mb-0">6521</h5>
                                            <p class="text-muted font-14">Pending</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="mb-0">44587</h5>
                                            <p class="text-muted font-14">Deactivated</p>
                                        </li>
                                    </ul>

                                <div id="flotRealTime" class="flot-chart flot-chart-height"></div>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-5">
                        <div class="card m-b-20 trade">
                            <div class="card-body">
                                <h4 class="mt-0 header-title float-left">TRADE</h4>
                                <br>
                                <div class="menu-portfolio">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#stock" role="tab">Stock</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#option" role="tab">Option</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#spread" role="tab">Spread</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#combo" role="tab">Combo</a>
                                        </li>
                                    </ul>
                                    <!-- tab content-->
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="stock" role="tabpanel">
                                            <div class="float-left">
                                                <ul>
                                                    <li class="sub-menu-trade" >
                                                        <a class="sub-menu-trade-color" >Bid</a>
                                                    </li >
                                                    <li class="sub-menu-trade " >
                                                        <strong class="value-sub-menu">  137.10  </strong>
                                                    </li>
                                                    <li class="sub-menu-trade " >
                                                       <a class="sub-menu-trade-color"> Mid </a>
                                                    </li>
                                                    <li class="sub-menu-trade " >
                                                        <strong class="value-sub-menu">  137.10  </strong>
                                                    </li>
                                                    <li class="sub-menu-trade " >
                                                        <a class="sub-menu-trade-color">Ask</a>
                                                    </li>
                                                    <li class="sub-menu-trade " >
                                                        <strong class="value-sub-menu">  137.10  </strong>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="position-button-trade">
                                            <div class="btn-group btn-group-toggle float-left" data-toggle="buttons">
                                                <label  class="btn btn-secondary active button-trade-with">
                                                    <input  type="checkbox" checked> Buy
                                                </label>
                                                <label class="btn btn-secondary button-trade-with ">
                                                    <input type="checkbox"> Sell
                                                </label>
                                            </div>

                                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                                <label class="btn btn-secondary active button-trade-with">
                                                    <input type="checkbox" checked> Open
                                                </label>
                                                <label class="btn btn-secondary button-trade-with">
                                                    <input  type="checkbox"> Close
                                                </label>
                                            </div>
                                            </div>
                                            <br><br><br>



                                            <label class="label-text"> Shares</label>
                                            <input class="float-right input-trade" type="number" value="0">


                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle button-trade-order-blue" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Order Type
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">LoremIpsum</a>
                                                    <a class="dropdown-item" href="#">LoremIpsum</a>
                                                    <a class="dropdown-item" href="#">LoremIpsum</a>
                                                </div>
                                            </div>
                                            <br>

                                                <label class="label-text" > Stop Price</label>
                                                <input class="float-right input-trade" type="number" value="0">

                                            <br> <br>

                                            <label class="label-text" > Limit Price</label>
                                            <input class="float-right input-trade" type="number" value="0">

                                            <br>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle button-trade-order-blue" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Time In Force
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">LoremIpsum</a>
                                                    <a class="dropdown-item" href="#">LoremIpsum</a>
                                                    <a class="dropdown-item" href="#">LoremIpsum</a>
                                                </div>
                                            </div>
                                            <br>
                                            <button class="button-order-trade" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Preview
                                            </button>
                                            <br>
                                            <p class="text-trade">Brokerage Services provided by Tradier Brokerage, Inc. Member
                                                FINRA & SIPC</p>

                                        </div>
                                        <div class="tab-pane p-3" id="option" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                LoremIpsum
                                            </p>
                                        </div>


                                        <div class="tab-pane p-3" id="spread" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                LoremIpsum
                                            </p>
                                        </div>


                                        <div class="tab-pane p-3" id="combo" role="tabpanel">

                                            <p class="font-14 mb-0">
                                                LoremIpsum
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <div class="menu-portfolio">

                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#coveredcall" role="tab">Covered Call</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#calloption" role="tab">Call Option</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#putoption" role="tab">Put Option</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#callspread" role="tab">Call Spread</a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="coveredcall" role="tabpanel">
                                        <div class="row" id="test" style="position: absolute; margin-left: 70px;">

                                            <div class="dropdown margin-dropdown">
                                                <button class="btn btn-secondary dropdown-toggle button-trade-order-blue margin-call-components" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Expiration
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <button class="dropdown-item"  id="MAR" onclick="searchExpiration()">MAR-22-18</button>
                                                    <a class="dropdown-item"  id="MAR1" >MAR-23-18</a>
                                                    <a class="dropdown-item"  id="MAR2">MAR-24-18</a>
                                                </div>
                                            </div>

                                            <input id="bidPrice" class="input-width" placeholder="Enter your purchase price">

                                            <button class="margin-call-components button-display-color" onClick="searchBid()">Run</button>

                                            <input id="targetPrice" class="input-width" placeholder="Enter your target price">

                                            <button class="margin-call-components button-display-color" onClick="searchTarget()">Run</button>

                                        </div>
                                        <!-- row -->
                                        <!-- Data Table-->
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table  table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th data-priority="1">Strike</th>
                                                        <th data-priority="3">Expiration</th>
                                                        <th data-priority="1">Intrinsic Val</th>
                                                        <th data-priority="3">Bid Prem</th>
                                                        <th data-priority="3">Bid Price</th>
                                                        <th data-priority="6">Break Even</th>
                                                        <th data-priority="6">Stock Loss</th>
                                                        <th data-priority="6">Max % Yield</th>
                                                        <th data-priority="6">Price Target</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>$140</td>
                                                        <td>MAR-22-18</td>
                                                        <td>$110.50</td>
                                                        <td class="red">($5.50)</td>
                                                        <td>$11.50</td>
                                                        <td>$155.50</td>
                                                        <td class="green">44.50%</td>
                                                        <td class="green">10.50 %</td>
                                                        <td>$10.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$141</td>
                                                        <td>MAR-23-18</td>
                                                        <td>$110.50</td>
                                                        <td class="red">($5.50)</td>
                                                        <td>$10.50</td>
                                                        <td>$155.50</td>
                                                        <td class="green">44.50%</td>
                                                        <td class="green">10.50 %</td>
                                                        <td>$11.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$142</td>
                                                        <td>MAR-24-18</td>
                                                        <td>$110.50</td>
                                                        <td class="red">($5.50)</td>
                                                        <td>$10.50</td>
                                                        <td>$155.50</td>
                                                        <td class="green">44.50%</td>
                                                        <td class="green">10.50 %</td>
                                                        <td>$10.50</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane p-3" id="calloption" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            LoremIpsum
                                        </p>
                                    </div>
                                    <div class="tab-pane p-3" id="putoption" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            LoremIpsum
                                        </p>
                                    </div>
                                    <div class="tab-pane p-3" id="callspread" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            LoremIpsum
                                        </p>
                                    </div>
                                </div>


                        </div>
                    </div>
                 </div>
                </div>
            </div>
            <!-- end left side -->

            <!-- right side -->
            <div class="col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title float-right">WATCHLIST</h4>
                                <table class="table table-vertical">
                                    @foreach($spy_price['quotes']['quote'] as $symbol)
                                        <tr>
                                            <td>
                                                <strong>
                                                    {{$symbol['symbol']}}
                                                </strong>
                                            </td>
                                            <td @if($symbol['change_percentage'] < 0) class="red" @elseif($symbol['change_percentage'] > 0) class="green" @endif>
                                                @if(!$symbol['change_percentage'])
                                                    -
                                                @elseif($symbol['change_percentage'])
                                                    {{$symbol['change_percentage']}}%
                                                @endif
                                            </td>
                                            <td>
                                                @if(!$symbol['last'])
                                                    -
                                                @elseif($symbol['last'])
                                                    ${{$symbol['last']}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                    </div>
                </div>
            </div>
            <!-- end right side -->

        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
@endsection

@section('script')

    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.time.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.selection.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/curvedLines.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/flot.init.js')}}"></script>
    <!--Morris Chart-->
    <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>

    <!-- Responsive-table-->
    <script src="{{ URL::asset('assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>

    <!-- switch color Theme -->
    <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
    <script src="{{ URL::asset('assets/js/darkTheme.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slick.js') }}"></script>
    <script src="{{ URL::asset('assets/js/filters.js') }}"></script>

@endsection

@section('script-bottom')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
