@extends('layouts.master')
{{--['spy_price'=>$spy_price, 'account'=>$account, 'typeAccount'=>$typeAccount]--}}

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

@section('breadcrumb')
    <h4 class="page-title">OptionScanner</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">

        </li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid p-0 m-0">
        <div class="row m-0">
            <div class="col-md-7 p-0" >
                <div class="card m-b-0" >
                    <div class="card-body portfolio-content">
                        <ul class="menu-my-portfolio p-0">
                            @if (isset($arrayAccountBalances))
                                @foreach ($arrayAccountBalances as $accountBalance)
                                    <li class="float-left list-unstyled my-portfolio-menu" data-account="{{ isset($accountBalance['balances']['account_number']) ? $accountBalance['balances']['account_number'] : ''}}"
                                        @if ($loop->first) style="display:list-item" @else style="display:none" @endif
                                    >
                                        <a class="font-size-portfolio">${{ isset($accountBalance['balances']['total_equity']) ? $accountBalance['balances']['total_equity'] : '' }}</a>
                                    </li >

                                    <li class="float-left list-unstyled my-portfolio-menu" data-account="{{ isset($accountBalance['balances']['account_number']) ? $accountBalance['balances']['account_number'] : ''}}"
                                        @if ($loop->first) style="display:list-item" @else style="display:none" @endif
                                    >
                                        <a class="menu-my-portfolio-color">Unrealized P/L</a>
                                        <p
                                                @if($accountBalance['balances']['open_pl'] < 0) class="red" @elseif($accountBalance['balances']['open_pl'] > 0) class="green" @endif
                                        >
                                            <strong>${{ isset($accountBalance['balances']['open_pl']) ? $accountBalance['balances']['open_pl'] : '' }}</strong>
                                        </p>
                                    </li>
                                    <li class="float-left list-unstyled my-portfolio-menu" data-account="{{ $accountBalance['balances']['account_number']}}"
                                        @if ($loop->first) style="display:list-item" @else style="display:none" @endif
                                    >
                                        <a class="menu-my-portfolio-color" >Realized P/L</a>
                                        <p
                                                @if($accountBalance['balances']['close_pl'] < 0) class="red" @elseif($accountBalance['balances']['close_pl'] > 0) class="green" @endif
                                        ><strong>${{ isset( $accountBalance['balances']['close_pl']) ?  $accountBalance['balances']['close_pl'] : ''  }}</strong></p>
                                    </li>
                                @endforeach
                            @endif
                                <li class="float-right list-unstyled portfolio-title title-card">
                                    <a class="menu-my-portfolio-color"><strong> My Portfolio</strong> </a>
                                </li>
                        </ul>


                        <div class="balances-content">
                            @if(isset($arrayAccountBalances))
                                @foreach ($arrayAccountBalances as $accountBalance)
                                    <div class="item" data-account="{{ isset($accountBalance['balances']['account_number']) ? $accountBalance['balances']['account_number'] : ""}}"
                                        @if ($loop->first) style="display:inline-block" @else style="display:none" @endif
                                    >
                                        <a class="menu-my-portfolio-color">  Cash </a>
                                        <p><strong> ${{ isset($accountBalance['balances']['total_cash']) ? $accountBalance['balances']['total_cash'] : ''}} </strong></p>
                                    </div >
                                    <div class="item" data-account="{{ isset($accountBalance['balances']['account_number']) ? $accountBalance['balances']['account_number'] : ''}}"
                                        @if ($loop->first) style="display:inline-block" @else style="display:none" @endif
                                    >
                                        <a class="menu-my-portfolio-color"> Stocks </a>
                                        <p><strong> ${{ isset($accountBalance['balances']['stock_long_value']) ? $accountBalance['balances']['stock_long_value'] : '' }}</strong></p>
                                    </div>
                                    <div class="item" data-account="{{ $accountBalance['balances']['account_number']}}"
                                        @if ($loop->first) style="display:inline-block" @else style="display:none" @endif
                                    >
                                        <a class="menu-my-portfolio-color"> Options</a>
                                        <p><strong> ${{ isset($accountBalance['balances']['option_long_value']) ? $accountBalance['balances']['option_long_value'] + $accountBalance['balances']['option_short_value'] : ''}}</strong></p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="table-responsive col-xl-12 p-0 m-t-5">
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified w-27" role="tablist" id="position-order-tab">
                                <li class="nav-item float-left">
                                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Positions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Orders</a>
                                </li>
                            </ul>
                        </div>

                        <!-- tab content-->
                        <div class="tab-content position-order mt-1">

                            <div class="tab-pane active p-0" id="home2" role="tabpanel">

                                <div class="table-responsive">
                                    <table class="table table-vertical">

                                        <thead>
                                        <tr>
                                            <th>Symbol</th>
                                            <th>Change</th>
                                            <th>Quantity</th>
                                            <th>Cost Basis</th>
                                            <th>Market Value</th>
                                            <th>Total Gain</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td class="symbol-name">
                                                11/18/2020 AMZN 1,150.0 Call
                                                <span class="price">$10.50</span>
                                            </td>
                                            <td class="green">
                                                $0.50
                                                <span class="green">5.00%</span>
                                            </td>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                $9.00
                                            </td>
                                            <td>
                                                $12,600.00
                                            </td>
                                            <td class="green">
                                                $1,800.00
                                                <span class="green">16.67%</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">
                                                    <strong>Trade</strong>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="symbol-name">
                                                FB
                                                <span class="price">$165.25</span>
                                            </td>
                                            <td class="red">
                                                $-0.50
                                                <span class="red">-1.45%</span>
                                            </td>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                $9.00
                                            </td>
                                            <td>
                                                $12,600.00
                                            </td>
                                            <td class="green">
                                                $1,800.00
                                                <span class="green">16.67%</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">
                                                    <strong>Trade</strong>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="symbol-name">
                                                TSLA
                                                <span class="price">$280.50</span>
                                            </td>
                                            <td class="red">
                                                $-0.50
                                                <span class="red">-1.45%</span>
                                            </td>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                $9.00
                                            </td>
                                            <td>
                                                $12,600.00
                                            </td>
                                            <td class="red">
                                                $-1,800.00
                                                <span class="red">-16.67%</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">
                                                    <strong>Trade</strong>
                                                </button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane p-0" id="profile2" role="tabpanel">
                                <p class="font-14 mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card m-b-0">
                    <div class="card-body">
                        <div id="linea">
                            <ul>
                                <li class="float-right list-unstyled ">
                                    <a><strong>Falling Knife Screener</strong></a>
                                </li>
                            </ul>

                            <br>

                            <ul class="float-left">
                                <li class="float-left list-unstyled my-portfolio-menu">
                                    <a> <strong> Cash </strong> </a>
                                    <p>$100,050.25</p>
                                </li >
                                <li class="float-left list-unstyled my-portfolio-menu">
                                    <a> <strong>Stocks </strong></a>
                                    <p>$15,030.50</p>
                                </li>
                                <li class="float-left list-unstyled my-portfolio-menu">
                                    <a> <strong>Options</strong></a>
                                    <p>$9,895.10</p>
                                </li>
                            </ul>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-vertical">

                                <thead>
                                <tr>
                                    <th>Symbol</th>
                                    <th>Change</th>
                                    <th>Quantity</th>
                                    <th>Cost Basis</th>
                                    <th>Market Value</th>
                                    <th>Total Gain</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td class="symbol-name">
                                        11/18/2020 AMZN 1,150.0 Call
                                        <span class="price">$10.50</span>
                                    </td>
                                    <td>
                                        $0.50
                                        <span>5.00%</span>
                                    </td>
                                    <td>
                                        12
                                    </td>
                                    <td>
                                        $9.00
                                    </td>
                                    <td>
                                        $12,600.00
                                    </td>
                                    <td>
                                        $1,800.00
                                        <span>16.67%</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">Trade</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="symbol-name">
                                        FB
                                        <span class="price">$165.25</span>
                                    </td>
                                    <td>
                                        $0.50
                                        <span>5.00%</span>
                                    </td>
                                    <td>
                                        12
                                    </td>
                                    <td>
                                        $9.00
                                    </td>
                                    <td>
                                        $12,600.00
                                    </td>
                                    <td>
                                        $1,800.00
                                        <span>16.67%</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">Trade</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="symbol-name">
                                        TSLA
                                        <span class="price">$280.50</span>
                                    </td>
                                    <td>
                                        $0.50
                                        <span>5.00%</span>
                                    </td>
                                    <td>
                                        12
                                    </td>
                                    <td>
                                        $9.00
                                    </td>
                                    <td>
                                        $12,600.00
                                    </td>
                                    <td>
                                        $1,800.00
                                        <span>16.67%</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">Trade</button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-5 p-0">
                <div class="row m-0">
                    <div class="col-md-6 pr-0 p-l-12" id="trending-sector">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <div class="header-title">
                                    Trending Sectors
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vertical">
                                        <tr>
                                            <td>
                                                Airline & Travel Leisure
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Banking (Regional / Foreign)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Banking (Regional / Foreign)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Banking (Regional / Foreign)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Computer (Big Data)
                                            </td>
                                            <td>
                                                1.25%
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card m-b-20">
                            <div class="card-body">
                                <a class="mt-0 header-title float-right title-card"> <strong>Top Gainers</strong></a>

                                <div class="table-responsive">
                                    <table class="table table-vertical">
                                        @if(isset($spy_price))
                                            @foreach($spy_price['quotes']['quote'] as $symbol)
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            {{$symbol['symbol']}}
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>


                            </div>
                        </div>

                        <div class="card m-b-20">
                            <div class="card-body">
                                <a class="mt-0 header-title float-right title-card"><strong> Volumen Movers </strong></a>

                                <div class="table-responsive">
                                    <table class="table table-vertical">
                                        @if(isset($spy_price))
                                            @foreach($spy_price['quotes']['quote'] as $symbol)
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            {{$symbol['symbol']}}
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        2.12%
                                                    </td>
                                                    <td>
                                                        178.25
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pr-0 p-l-12">
                        <div class="card m-b-20 color-watchlist">
                            <div class="padding-watchlist">
                                <a class="mt-0 header-title float-right title-card"> <strong>Watchlist</strong></a>

                                <div class="table-responsive">
                                    <table class="table table-vertical">
                                        @if(isset($spy_price))
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
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>  <!-- end row -->
    </div>
@endsection

@section('script')
    <!--Morris Chart-->
    <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>

    <!-- switch color Theme -->
    <script src="{{ URL::asset('assets/js/switch.js') }}"></script>
    <script src="{{ URL::asset('assets/js/darkTheme.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slick.js') }}"></script>
    <script src="{{ URL::asset('assets/js/changeBalance.js') }}"></script>
@endsection
